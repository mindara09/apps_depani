<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS File Link  -->
    <link rel="stylesheet" href="{{ url('/assetsHome/css/style.css')}}">
    @section('css')

</head>

<body>

    <!-- HEADER -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo">
            <img src="{{ url('/assets/img/logo.png')}}" alt="" class="img-responsive" width="100">
        </a>

        <nav class="navbar">
            <a href="{{ route('home')}}#home">Home</a>
            <a href="{{ route('home')}}#about">About</a>
            <a href="{{ route('home')}}#menu">Menu</a>
            <a href="{{ route('home')}}#review">Review</a>
            <a href="{{ route('home')}}#book">Book</a>
        </nav>

        <a href="{{ route('login')}}" class="btn">Login</a>
    </header>

    @yield('content')
    
    <!-- FOOTER -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Our Branches</h3>
                <a href="#"><i class="fas fa-arrow-right"></i> Bandung</a>
                <a href="#"><i class="fas fa-arrow-right"></i> Jakarta</a>
                <a href="#"><i class="fas fa-arrow-right"></i> Bogor</a>
                <a href="#"><i class="fas fa-arrow-right"></i> Tangerang</a>
                <a href="#"><i class="fas fa-arrow-right"></i> Banten</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="#home"><i class="fas fa-arrow-right"></i> Home</a>
                <a href="#about"><i class="fas fa-arrow-right"></i> About</a>
                <a href="#menu"><i class="fas fa-arrow-right"></i> Menu</a>
                <a href="#review"><i class="fas fa-arrow-right"></i> Review</a>
                <a href="#book"><i class="fas fa-arrow-right"></i> Book</a>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"><i class="fas fa-phone"></i> +62-877-5272-5225</a>
                <a href="#"><i class="fas fa-phone"></i> +62-817-757-899</a>
                <a href="#"><i class="fas fa-envelope"></i> kukopina@gmail.com</a>
                <a href="#"><i class="fas fa-envelope"></i> jl. Kurdi I Raya No.32A, Bandung</a>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <a href="#"><i class="fab fa-whatsapp"></i> Whatsapp</a>
                <a href="#" id="instagramLink"><i class="fab fa-instagram"></i> instagram</a>
            </div>
        </div>

        <div class="credit">Created by <span>Devani Hendra Oktaviyanti</span></div>
    </section>
    <!-- SWIPER -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Custom JS File Link  -->
    <script src="{{ url('/assetsHome/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        // Fungsi untuk mendeteksi jenis perangkat (desktop atau mobile)
        function isMobileDevice() {
        return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
        }
    
        // Ambil tautan Instagram
        var instagramLink = document.getElementById('instagramLink');
    
        // Tentukan URL Instagram sesuai dengan jenis perangkat
        if (isMobileDevice()) {
        instagramLink.href = "instagram://user?username=kukopina"; // Ganti dengan username yang sesuai
        } else {
        instagramLink.href = "https://www.instagram.com/kukopina/"; // Ganti dengan URL Instagram web
        }
    </script>
  
    @section('js')

</body>

</html>