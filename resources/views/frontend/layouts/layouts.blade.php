<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', $configuration->title ?? '')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $configuration->meta_descriptions ?? '' }}" />
    <meta name="keywords" content="{{ $configuration->meta_keywords ?? '' }}" />
    <link rel="shortcut icon" href="{{ asset($configuration->title_logo ?? '') }}" type="image/x-icon">
    <meta name="author" content="Akmal" />
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.min.css') }}">
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('frontend/fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <style>
        .dropdown-menu {
            display: none;
        }
    </style>
</head>

<body>
    <a href="https://wa.me/{{ $configuration->phone_number ?? '' }}" target="_blank" class="whatsapp-btn">
        <i class="fa fa-whatsapp"></i>
    </a>

    @include('frontend.layouts.header')

    @if (Request::path() !== '/')
        <section class="site-hero inner-page overlay"
            style="background-image: url({{ asset('frontend/images/hero_4.jpg') }})" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row site-hero-inner justify-content-center align-items-center">
                    <div class="col-md-10 text-center" data-aos="fade">
                        <h1 class="heading mb-3">@yield('site-hero')</h1>
                        <ul class="custom-breadcrumbs mb-4">
                            <li><a href="{{ route('index') }}">Beranda</a></li>
                            <li>&bullet;</li>
                            <li>@yield('site-hero')</li>
                        </ul>
                    </div>
                </div>
            </div>

            <a class="mouse smoothscroll" href="#next">
                <div class="mouse-icon">
                    <span class="mouse-wheel"></span>
                </div>
            </a>
        </section>
    @endif

    @yield('content')

    @include('frontend.layouts.sweetalert')

    <section class="section bg-image overlay" style="background-image: url({{ asset('frontend/images/hero_4.jpg') }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 text-center mb-4 mb-md-0 text-md-left" data-aos="fade-up">
                    <h3 class="text-white font-weight-bold">Tempat Terbaik untuk Menginap. Pesan Sekarang!</h3>
                </div>
                <div class="col-12 col-md-6 text-center text-md-right" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{ route('room') }}" class="btn btn-outline-white-primary py-3 text-white px-5">Pesan
                        Sekarang!</a>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/aos.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/lightbox.js') }}"></script>
</body>

</html>
