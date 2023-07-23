<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Hash;

class DashboardController extends Controller
{
    public function login(Request $request){

        return view('dashboard.login');
    }

    public function proses_login(Request $request){

        // Validasi input dari form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Lakukan proses autentikasi dengan menggunakan metode attempt
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            // Jika autentikasi berhasil, redirect ke halaman dashboard atau halaman beranda
            return redirect()->route('transaction');
        } else {
            // Jika autentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect()->route('login')->with('error', 'Invalid email or password.');
        }

    }

    // Proses logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    // transaksi
    public function transaction(Request $request){
        if($request->get('type') == 'pembayaran'){

            $id = $request->get('id');
            $result = DB::table('transaction')->join('users', 'transaction.user_id', '=', 'users.id')->select('users.name as name_user', 'transaction.*')->orderBy('id', 'desc')->paginate(10);
            $transaction = DB::table('transaction')->where('id', $id)->first();

            return view('dashboard.transaksi', compact('result', 'transaction'));
        }

        if($request->get('cari') != null){
            
            $result = DB::table('transaction')->join('users', 'transaction.user_id', '=', 'users.id')->select('users.name as name_user', 'transaction.*')->where('users.name', 'like', '%'.$request->get('cari').'%')->orderBy('id', 'desc')->paginate(10);

            return view('dashboard.transaksi', compact('result'));
        }

        $result = DB::table('transaction')->join('users', 'transaction.user_id', '=', 'users.id')->select('users.name as name_user', 'transaction.*')->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.transaksi', compact('result'));
    }

    // submit transaksi
    public function submit_transaction(Request $request){
        if($request->get('type') != null && $request->get('id') !== null){
            // Konversi 'pay' dan 'change' dari format rupiah menjadi angka
            $pay = floatval(str_replace(['Rp', '.', ','], '', $request->pay));
            $change = floatval(str_replace(['Rp', '.', ','], '', $request->change));

            // Hapus .0 di belakang angka jika ada
            $pay = number_format($pay, 0, '', '');
            $change = number_format($change, 0, '', '');

            $update = DB::table('transaction')->where('id', $request->get('id'))->update([
                'pay' => $pay,
                'change' => $change,
                'payment' => $request->payment,
                'status_payment' => 1,
                'updated_at' => Carbon::now()
            ]);

            if(!$update){

                return redirect()->back()->with('error', 'Gagal submit transaksi');
            }
            else {

                return redirect()->back()->with('success', 'Sukses Submit Transaksi!');
            }
        }
    }

    // pengguna
    public function users(){
        $result = DB::table('users')->join('role_users', 'users.role_user', '=', 'role_users.id')->select('role_users.name_role', 'users.*')->orderBy('id', 'desc')->paginate(10);

        return view('dashboard.pengguna', compact('result'));
    }

    // reservasi
    public function reservation(){
        $result = DB::table('reservation')->join('users', 'reservation.user_id', '=', 'users.id')->select('users.name as name_user', 'users.no_telp', 'reservation.*')->orderBy('reservation.id', 'desc')->paginate(15);

        return view('dashboard.reservasi', compact('result'));
    }

    // status reservasi
    public function status_reservation($id, $status_id){

        DB::table('reservation')->where('id', $id)->update(['status' => $status_id]);

        return redirect()->back()->with('success', 'Status reservation has been updated successfully.');
    }

    // pengaturan
    public function settings(){
        $users = DB::table('users')->join('role_users', 'users.role_user', '=', 'role_users.id')->select('role_users.name_role as role_user', 'users.name as name_user', 'users.email', 'users.no_telp')->where('role_user', 1)->first();
        $settings = DB::table('settings')->first();

        return view('dashboard.pengaturan', compact('users', 'settings'));
    }

    // update pengaturan
    public function update_settings(){
        DB::table('settings')
            ->where('id', 1)
            ->update([
                'link_maps' => request('link_maps'),
                'link_instagram' => request('link_instagram'),
                'no_telp' => request('no_telp')
            ]);

        return redirect()->back()->with('success', 'Data updated successfully.');
    }

    // update password
    public function update_password(){
        $name = request('name');
        $email = request('email');
        $no_telp = request('no_telp');
        $password = request('password');
        $confirm_password = request('confirm_password');

        // Validasi jika password dan konfirmasi password tidak sesuai
        if ($password !== $confirm_password) {
            return redirect()->back()->with('error', 'Password and confirm password do not match.');
        }

        $query = DB::table('users')->where('id', 1);

        // Cek apakah password diisi atau tidak
        if (!empty($password)) {
            // Enkripsi password
            $hashedPassword = Hash::make($password);

            $query->update(['password' => $hashedPassword]);
        }

        // Update kolom lainnya jika ada
        $query->when(!empty($name), function ($query) use ($name) {
            return $query->update(['name' => $name]);
        });

        $query->when(!empty($email), function ($query) use ($email) {
            return $query->update(['email' => $email]);
        });

        $query->when(!empty($no_telp), function ($query) use ($no_telp) {
            return $query->update(['no_telp' => $no_telp]);
        });

        return redirect()->back()->with('success_update_password', 'User data updated successfully.');
    }

    // review 
    public function review(){
        $result = DB::table('review')->join('users', 'review.user_id', '=', 'users.id')->select('users.name', 'review.*')->orderBy('id', 'desc')->paginate(15);

        return view('dashboard.review', compact('result'));
    }

    // produk
    public function product(){
        $result = DB::table('product')->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.produk', compact('result'));
    }

    // proses produk
    public function process_product(Request $request){
        //dd($request->all());
        $request->validate([
            'name_product' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required',
        ]);

        $insert = DB::table('product')->insert([
            'name_product' => $request->name_product,
            'price' => $request->price, 
            'desc' => $request->desc,
            'status_stock' => 1
        ]);

        if($insert) {
            
            return redirect()->back()->with('success', 'Berhasil tambah produk');
        }
        else {
            return redirect()->back()->with('error', 'Gagal tambah produk');
        }
    }

    // update produk
    public function update_product(Request $request, $id){
        //dd($request->all());

        $request->validate([
            'name_product' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required'
        ]);

        $update = DB::table('product')->where('id', $id)
        ->update([
            'name_product' => $request->name_product,
            'price' => $request->price,
            'desc' => $request->desc
        ]);

        if($update) {
            
            return redirect()->back()->with('success', 'Berhasil update produk');
        }
        else {
            return redirect()->back()->with('error', 'Gagal update produk');
        }
    }

    // hapus produk
    public function delete_product($id){
        // Menggunakan class DB untuk menghapus data pada tabel 'product'
        DB::table('product')->where('id', $id)->delete();

        // Redirect dengan message success menggunakan with()
        return redirect()->back()->with('success', 'Data product berhasil dihapus.');
    }

    public function status_stock($id, $status_stok){
        DB::table('product')->where('id', $id)->update(['status_stock' => $status_stok]);

        return redirect()->back()->with('success', 'Stok Barang sudah update!');
    }

}
