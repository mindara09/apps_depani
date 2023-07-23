@extends('layout.layout-home')
@section('title', 'KUKOPINA')
@section('content')

<!-- HOME -->
<section class="home" id="home">
    @if(session('success'))
        <div class="alert-success" role="alert">
            <strong>{{session('success') }}</strong>
        </div>
    @elseif(session('error'))
        <div class="alert-danger" role="alert">
            <strong>{{session('error') }}</strong>
        </div>
    @endif
    <div class="row">
        <div class="content">
            <h3>Enjoy Every Moment With KUKOPINA</h3>
            <a href="https://goo.gl/maps/KfZ6Cev4uqkx6bJQ9" class="btn">Go to Maps</a>
        </div>

        <div class="image">
            <img src="{{ url('/assetsHome/image/home-img-1.png')}}" class="main-home-image" alt="">
        </div>
    </div>

    <div class="image-slider">
        <img src="{{ url('/assetsHome/image/home-img-1.png')}}" alt="">
        <img src="{{ url('/assetsHome/image/home-img-2.png')}}" alt="">
        <img src="{{ url('/assetsHome/image/home-img-3.png')}}" alt="">
    </div>
</section>

<!-- ABOUT -->
<section class="about" id="about">
    <h1 class="heading">About Us <span>Why Choose Us</span></h1>

    <div class="row">
        <div class="image">
            <img src="{{ url('/assetsHome/image/barista.jpg')}}" alt="">
        </div>

        <div class="content">
            <h3 class="title">What's Make Our Coffee Special!</h3>
            <p>Made with a high quality and will make you enthusiast.</p>
            <a href="#" class="btn">Read more</a>
            <div class="icons-container">
                <div class="icons">
                    <img src="{{ url('/assetsHome/image/about-icon-1.png')}}" alt="">
                    <h3>Quality Coffee</h3>
                </div>
                <div class="icons">
                    <img src="{{ url('/assetsHome/image/about-icon-2.png')}}" alt="">
                    <h3>Our Branches</h3>
                </div>
                <div class="icons">
                    <img src="{{ url('/assetsHome/image/about-icon-3.png')}}" alt="">
                    <h3>Free Delivery</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<a href="{{ route('menu')}}" class="btn float-end">Lihat Menu Lainnya</a>
<!-- MENU -->
<section class="menu" id="menu">
    <h1 class="heading">Our Menu <span>Our Menu</span></h1>
    <div class="box-container">
        @forelse ($result as $item)
        <a href="#" class="box">
            <div class="content" style="margin-left: 20px;">
                <h3>{{ $item->name_product}}</h3>
                <p>{{ $item->desc}}</p>
                <span>Rp.{{ $item->price}},-</span>
            </div>
        </a>
        @empty
        <a href="#" class="box">
            <div class="content" style="margin-left: 20px;">
                Data Produk tidak ada
            </div>
        </a>
        @endforelse
    </div>
</section>

<!-- REVIEW -->
<section class="review" id="review">
    <h1 class="heading">Reviews <span>What People Says</span></h1>

    <div class="swiper review-slider">
        <div class="swiper-wrapper">
            @foreach($reviews as $review)
                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="{{ url('/assetsHome/image/logo pria.png')}}" alt="">
                    <div class="stars">
                        @for ($i = 1; $i <= $review->start; $i++)
                            <i class="fas fa-star"></i> <!-- Simbol bintang -->
                        @endfor
                        
                    </div>
                    <p>{{ $review->comment }}</p>
                    <h3>{{ $review->name_user }}</h3>
                    <span>Customer</span>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>


<!-- BOOK -->
<section class="book" id="book">
    <h1 class="heading">Booking <span>Reserve a table</span></h1>

    <form action="{{ route('create_reservation')}}" method="POST">
        @csrf
        <input type="text" placeholder="Name" class="box" name="name">
        <input type="email" placeholder="Email" class="box" name="email">
        <input type="number" placeholder="Number" class="box" name="no_telp">
        <input type="text" placeholder="Time Attendance" class="box" name="time_attendance">
        <textarea placeholder="Message" class="box" id="" cols="30" rows="10" name="desc"></textarea>
        <input type="submit" value="send message" class="btn">
    </form>
</section>

@endsection
