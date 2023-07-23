<html lang="en" itemscope itemtype="http://schema.org/WebPage">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('/assets/img/favicon.png') }}">
    <title>@yield('title')</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ url('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('/assets/css/material-kit.css?v=3.0.4') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> @yield('css')
  </head>
  <body class="index-page bg-gray-200">
    <!-- Navbar -->
    <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
            <div class="container-fluid px-0">
              <a class="navbar-brand font-weight-bolder ms-sm-3" href="https://demos.creative-tim.com/material-kit/index" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                <img src="{{ url('/assets/img/logo.png')}}" alt="" class="img-responsive" width="100">
              </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </span>
              </button>
              <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                <ul class="navbar-nav navbar-nav-hover ms-auto">
                  @if (auth()->user() != null)
                  <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="material-icons opacity-6 me-2 text-md">dashboard</i> Dashboard <img src="./assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                    </a>
                    <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages">
                      <div class="d-none d-lg-block">
                        <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">Menu </h6>
                        <a href="{{ route('users') }}" class="dropdown-item border-radius-md">
                          <span>Daftar Pengguna</span>
                        </a>
                        <a href="{{ route('product') }}" class="dropdown-item border-radius-md">
                          <span>Daftar Produk</span>
                        </a>
                        <a href="{{ route('reservation') }}" class="dropdown-item border-radius-md">
                          <span>Daftar Reservasi</span>
                        </a>
                        <a href="{{ route('transaction') }}" class="dropdown-item border-radius-md">
                          <span>Daftar Transaksi</span>
                        </a>
                        <a href="{{ route('review') }}" class="dropdown-item border-radius-md">
                          <span>Daftar Review Customer</span>
                        </a>
                        <a href="{{ route('settings') }}" class="dropdown-item border-radius-md">
                          <span>Pengaturan</span>
                        </a>
                      </div>
                    </div>
                  </li>
                  <li class="nav-item my-auto ms-3 ms-lg-0">
                    <a href="{{ route('logout')}}" class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">Logout</a>
                  </li>
                  @else
                  <li class="nav-item my-auto ms-3 ms-lg-0">
                    <a href="{{ route('home')}}" class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">Kembali</a>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>
      </div>
    </div> @yield('content') <footer class="footer pt-5 mt-5">
      <div class="col-12">
        <div class="text-center">
          <p class="text-dark my-4 text-sm font-weight-normal"> All rights reserved. Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Created by Devani Hendra Oktaviyanti </p>
        </div>
      </div>
      </div>
      </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="{{ url('/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
    <script src="{{ url('/assets/js/plugins/countup.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/choices.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/prism.min.js') }}"></script>
    <script src="{{ url('/assets/js/plugins/highlight.min.js') }}"></script>
    <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
    <script src="{{ url('/assets/js/plugins/rellax.min.js') }}"></script>
    <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
    <script src="{{ url('/assets/js/plugins/tilt.min.js') }}"></script>
    <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
    <script src="{{ url('/assets/js/plugins/choices.min.js') }}"></script> @yield('js')
  </body>
</html>