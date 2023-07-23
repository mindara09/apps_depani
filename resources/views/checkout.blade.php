@extends('layout.layout-home')
@section('title', 'Checkout')
@section('content')

<a href="{{ route('cart')}}" class="btn float-end" style="margin-right: 20px;">
    <i class="fas fa-arrow-left"></i>&nbsp;Keranjang
</a>
<section class="footer" style="margin-top: 100px;">
    @if(session('success'))
    <a href="" class="btn" style="margin-right: 20px;">
        {{ session('success') }}
    </a>
    @elseif(session('error'))
        <div class="alert-danger" role="alert">
            <strong>{{session('error') }}</strong>
        </div>
    @endif
    <h1 class="heading">Checkout <span>Checkout</span></h1>
    <div class="box-container">
        <div class="box">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-7">
                                <h3>Produk</h3>
                                <table class="table">
                                    <tr>
                                        <th>
                                            <a href="" style="text-align: left">Nama Produk</a>
                                        </th>
                                        <th>
                                            <a href="">Harga</a>
                                        </th>
                                        <th>
                                            <a href="">Qty</a>
                                        </th>
                                        <th>
                                            <a href="">Sub-Total</a>
                                        </th>
                                    </tr>
                                    @forelse (session('cart') as $id => $item)
                                    <tr>
                                        <td><a href="#"><i class="fas fa-mug-hot"></i> {{ $item['name_product']}}</a></td>
                                        <td>
                                            <center>
                                                <a href="#">Rp.{{ $item['price']}}</a>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="#">{{ $item['quantity']}}</a>
                                                    </div>
                                                </div>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="#">Rp. {{ $item['price'] * $item['quantity'] }}</a>
                                            </center>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <center>
                                                    <a href="">Data Keranjang masih kosong</a>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforelse
                                    <tr>
                                        <th colspan="3">
                                            <a href="" style="text-align: left">Total</a>
                                        </th>
                                        <th>
                                            <a href="">
                                                @if(session('cart_total'))
                                                    Rp.@php echo session('cart_total') @endphp
                                                @endif
                                            </a>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-1"></div>
                            <div class="col-4">
                                <h3>Checkout</h3>
                                <div class="form-container">
                                    <form action="{{ route('submit') }}" method="POST">
                                        @csrf
                                        <table class="">
                                            <tr>
                                                <th>
                                                    <input type="text" placeholder="Nama Customer" class="box" name="name" required>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <input type="email" placeholder="Email" class="box" name="email" required>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>
                                                    <input type="number" placeholder="Number" class="box" name="no_telp" required>
                                                </th>
                                            </tr>
                                        </table>
                                        <button type="submit" class="float-end custom-button" style="margin-top: 25px;">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection