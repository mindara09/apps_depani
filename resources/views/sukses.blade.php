@extends('layout.layout-home')
@section('title', 'Checkout')
@section('content')

<section class="footer" style="margin-top: 100px;">
    <h1 class="heading">Sukses <span>Submit Transaksi Berhasil</span></h1>
    <div class="box-container">
        <div class="box">
            <center>
                <a href="">Terima kasih  <strong>{{ $user->name }}</strong><br> tolong lakukan screenshot pesanan kamu ya dan berikan ke kasir, terima kasih!</a>
                <br><br>
                <div class="container">
                    <table class="table">
                        <tr>
                            <th><a href="">Nama Customer</a></th>
                            <th colspan="3"><a href="">{{  $user->name }}</a></th>
                        </tr>
                        <tr>
                            <th><a href="">Nama Produk</a></th>
                            <th><a href="">Quantity</a></th>
                            <th><a href="">Harga</a></th>
                            <th><a href="">Sub-Total</a></th>
                        </tr>
                        @foreach (json_decode($transaction->product) as $item)
                            <tr>
                                <td><center><a href="">{{ $item->name_product }}</a></center></td>
                                <td><center><a href="">{{ $item->quantity }}</a></center></td>
                                <td><center><a href="">{{ $item->price }}</a></center></td>
                                <td><center><a href="">{{ $item->quantity * $item->price }}</a></center></td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="3">
                                <a href="">Total</a>
                            </th>
                            <th><a href="">{{ $transaction->total_price }}</a></th>
                        </tr>
                    </table>
                </div>
                <a href="#">Kamu bisa memberikan review pelayanan kami ya, di link bawah ini ya. Terima kasih!</a>
                <a href="{{ route('review_customer') }}">Link Review Customer</a>
            </center>
        </div>
    </div>
</section>
<div style="margin-bottom: 200px;"></div>
@endsection