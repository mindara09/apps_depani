@extends('layout.layout-home')
@section('title', 'Keranjang')
@section('content')

<a href="{{ route('menu')}}" class="btn float-end" style="margin-right: 20px;">
    <i class="fas fa-arrow-left"></i>&nbsp;Menu
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
    <h1 class="heading">Cart <span>Your Cart</span></h1>
    <div class="box-container">
        <div class="box">
            <div class="container">
                <h3><i class="fas fa-shopping-cart"></i>&nbsp;Keranjang</h3>
                <br><br>
                <div class="row">
                    <div class="col-12">
                        <table class="table">
                            <tr>
                                <th>
                                    <a href="" style="text-align: left">Nama Produk</a>
                                </th>
                                <th>
                                    <a href="">Opsi</a>
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
                            <?php $total = 0; ?>
                            @if (session('cart'))
                                @forelse (session('cart') as $id => $item)
                                <tr>
                                    <td><a href="#"><i class="fas fa-mug-hot"></i> {{ $item['name_product']}}</a></td>
                                    <td>
                                        <center>
                                            <a href="{{ route('remove', $id)}}" style="color: red;"><i class="fas fa-trash-alt"></i>
                                                Hapus</a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="#">Rp.{{ $item['price']}}</a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="row">
                                                <div class="col-1">
                                                    <a href="{{ route('minusToCart', $id)}}" style="font-size: 20px;"><u>-</u></a>
                                                </div>
                                                <div class="col">
                                                    <a href="#">{{ $item['quantity']}}</a>
                                                </div>
                                                <div class="col-1">
                                                    <a href="{{ route('addToCart', $id)}}" style="font-size: 20px;"><u>+</u></a>
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
                                <?php $total += $item['quantity'] * $item['price']; ?>
                                <?php  $cart_total = session()->get('cart_total'); session()->put('cart_total', $total); ?>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <center>
                                                <a href="">Data Keranjang masih kosong</a>
                                            </center>
                                        </td>
                                    </tr>
                                @endforelse
                            @else
                            <tr>
                                <td colspan="5">
                                    <center>
                                        <a href="">Data Keranjang masih kosong</a>
                                    </center>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <th colspan="4">
                                    <a href="" style="text-align: left">Total</a>
                                </th>
                                <th>
                                    <a href="">
                                        @if(session('cart'))
                                            Rp.@php echo $total @endphp
                                        @endif
                                    </a>
                                </th>
                            </tr>
                            <tr>
                                @if (session('cart'))
                                <th colspan="5">
                                    <a href="{{ route('checkout') }}" class="btn float-end" style="margin-right: 50px;">&nbsp;&nbsp;Checkout &nbsp;&nbsp;</a>
                                </th> 
                                @endif
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection