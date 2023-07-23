@extends('layout.layout-home')
@section('title', 'KUKOPINA')
@section('content')

<!-- MENU -->

<a href="{{ route('cart')}}" class="btn float-end" style="margin-right: 20px;">
    <i class="fas fa-shopping-cart"></i>&nbsp;Keranjang @if(session('cart')){{ count(session('cart')) }}@endif
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
    
    <h1 class="heading">Our Menu <span>Our Menu</span></h1>
    <div class="box-container">
        @php $i = 0; @endphp
        @foreach ($result as $item)
            @if ($i % 8 === 0)
                <div class="box">
            @endif
            @if($item->status_stock == 0)
                <a href="#"><i class="fas fa-mug-hot"></i><u><strong>{{ $item->name_product }}</strong> - {{ $item->price }} <strong>Stok Habis</strong></u></a>
                <span style="font-size: 12px;"><i>{{ $item->desc }}</i></span>
            @else
                <a href="{{ route('addToCart', $item->id)}}"><i class="fas fa-mug-hot"></i><strong>{{ $item->name_product }}</strong> - {{ $item->price }} <strong>Klik</strong></del></a>
                <span style="font-size: 12px;"><i>{{ $item->desc }}</i></span>
            @endif
            @php $i++; @endphp
            @if ($i % 8 === 0 || $loop->last)
                </div>
            @endif
        @endforeach
    </div>
</section>

<br><br><br><br>
@endsection