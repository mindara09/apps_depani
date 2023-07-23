<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $result = DB::table('product')->inRandomOrder()->limit(6)->get();
        $reviews = DB::table('review')->join('users', 'review.user_id', '=','users.id')->select('users.name as name_user', 'review.*')->inRandomOrder()->limit(4)->get();

        return view('index', compact('result', 'reviews'));
    }

    public function create_reservation(Request $request){

        $insert = DB::table('users')->insertGetId([
            'role_user' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => bcrypt('default'),
            'created_at' => Carbon::now()
        ]);

        if(!$insert){

            return redirect()->back()->with('error', 'Gagal Reservasi');
        }

        $time_attendance = $request->time_attendance;
        $desc = $request->desc;
        DB::table('reservation')->insert([
            'user_id' => $insert,
            'time_attendance' => $time_attendance,
            'status' => 0,
            'desc' => $desc,
            'created_at' => Carbon::now()
        ]);
            
        return redirect()->back()->with('success', 'Berhasil Reservasi, selanjutnya akan di info oleh kami. Terima kasih! :)');
        
    }

    public function menu(){
        $result = DB::table('product')->get();
        
        return view('menu', compact('result'));
    }

    public function addToCart($id){
        $product = DB::table('product')->where('id', $id)->first();
        
        if(!$product){
            abort(404);
        }
    
        $cart = session()->get('cart');
    
        if(!$cart){
            $cart = [
                $id => [
                    'name_product' => $product->name_product,
                    'price' => $product->price,
                    'desc' => $product->desc,
                    'quantity' => 1
                ]
            ];
        } else {
            if(isset($cart[$id])){
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    'name_product' => $product->name_product,
                    'price' => $product->price,
                    'desc' => $product->desc,
                    'quantity' => 1
                ];
            }
        }
    
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function cart(){

        return view('keranjang');
    }

    public function remove($id){
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Berhasil hapus keranjang!');
        }
    }

    public function minusToCart($id){
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            // Kurangi quantity sebanyak 1
            $cart[$id]['quantity'] -= 1;
    
            // Pastikan quantity tidak negatif
            if($cart[$id]['quantity'] < 0){
                $cart[$id]['quantity'] = 0;
            }
    
            // Update session dengan data cart yang baru
            session()->put('cart', $cart);
    
            return redirect()->back()->with('success', 'Quantity decreased by 1!');
        }
        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    public function checkout(){

        return view('checkout');
    }

    public function submit(Request $request){

        $insert = DB::table('users')->insertGetId([
            'role_user' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => bcrypt('default'),
            'created_at' => Carbon::now()
        ]);

        if(!$insert){

            return redirect()->back()->with('error', 'Gagal Submit');
        };
        
        $cart = session('cart');
        $total_price = session('cart_total');

        $submit = DB::table('transaction')->insert([
                        'user_id' => $insert,
                        'product' => json_encode($cart),
                        'total_price' => $total_price,
                        'status_payment' => 0,
                        'created_at' => Carbon::now()
                    ]);
        if(!$submit){
            return redirect()->back()->with('error', 'Gagal Submit');
        }
        $delete_cart = session()->get('cart');
        $delete_total = session()->get('cart_total');
        
        session()->get('user_id');
        session()->put('user_id', $insert);


        $user = DB::table('users')->where('id', $insert)->first();
        $transaction = DB::table('transaction')->where('user_id', $insert)->first();
        if(!$user){
            return redirect()->back()->with('error', 'Gagal mengambil user');
        }

        unset($delete_cart);
        unset($delete_total);
        session()->forget('cart');
        session()->forget('cart_total');

        return view('sukses', compact('user', 'transaction'));
    }

    public function sukses(){

        return view('sukses');
    }

    public function review_customer(Request $request){

        if(session('user_id') == null){
            return redirect()->route('home');
        }

        return view('review');
    }

    public function submit_review(Request $request){

        $request->validate([
            'start' => 'required|numeric',
            'comment' => 'required'
        ]);

        $insert = DB::table('review')->insert([
            'user_id' => session('user_id'),
            'start' => $request->start,
            'comment' => $request->comment,
            'created_at' => Carbon::now()
        ]);

        if(!$insert){
            return redirect()->back()->with('error', 'Gagal submit review');    
        }

        session()->forget('user_id');

        return redirect()->route('home');
    }
}
