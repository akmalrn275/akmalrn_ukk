@extends('frontend.layouts.layouts')

@section('content')
    <section class="site-hero overlay">
        <div class="owl-carousel owl-theme">
            @foreach ($sliders as $slider)
                <div class="item position-relative d-flex align-items-center justify-content-center"
                     style="background-image: url('{{ asset($slider->image) }}'); background-size: cover; background-position: center; min-height: 100vh;">
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div>
                    
                    <div class="container position-relative" style="z-index: 2;">
                        <div class="row site-hero-inner justify-content-center align-items-center">
                            <div class="col-md-10 text-center" data-aos="fade-up">
                                <span class="custom-caption text-uppercase text-white d-block mb-3">
                                    Welcome To 5 <span class="fa fa-star text-primary"></span> Hotel
                                </span>
                                <h1 class="heading text-white">{{ $slider->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>        

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                nav: true,
                dots: true,
                animateOut: 'fadeOut'
            });
        });
    </script>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
                    <img src="{{ asset($about->image ?? '') }}" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
                    <h3 class="heading">Tentang Kami</h3>
                    <p class="mb-4">{!! Str::limit($about->description ?? '', 300, '...') !!}</p>
                    <p><a href="{{ route('about') }}" class="btn btn-primary text-white py-2 mr-3">Selengkapnya</a> <span
                            class="mr-3 font-family-serif"></p>
                </div>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h3 class="heading" data-aos="fade-up">Kamar</h3>
                    <p data-aos="fade-up" data-aos-delay="100">hotel ini menyediakan fasilitas tambahan seperti layanan
                        kamar, ruang pertemuan berkapasitas hingga 50 orang, restoran dengan berbagai menu pilihan, parkir
                        gratis, dan akses mudah ke berbagai destinasi wisata di Garut.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($rooms as $room)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up">
                        <a href="#" class="room">
                            <figure class="img-wrap position-relative">
                                <div class="status-badge position-absolute top-0 left-0 bg-{{ $room->serviceStatus == 'Tidak Tersedia' ? 'danger' : 'success' }} text-white p-2"
                                    style="z-index: 10;">
                                    <strong>{{ $room->serviceStatus }}</strong>
                                </div>
                                <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="img-fluid mb-3">
                            </figure>
                            <div class="p-3 text-center room-info">
                                <h3>{{ $room->name }}</h3>
                                <span class="text-uppercase letter-spacing-1">Rp
                                    {{ number_format($room->price, 0, ',', '.') }} / Malam</span>
                                <p><a href="{{ route('room.detail', $room->id) }}" class="btn btn-primary text-white">Pesan
                                        Sekarang</a></p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section slider-section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h3 class="heading" data-aos="fade-up">Galeri</h3>
                    <p data-aos="fade-up" data-aos-delay="100">Kami telah menyiapkan galeri khusus yang menampilkan berbagai
                        momen di In Situ Hotel Garut Syariah. Dalam galeri ini, Anda dapat menemukan beragam gambar yang
                        menggambarkan suasana hotel, kenyamanan fasilitas, serta berbagai event yang diselenggarakan.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($gallerys as $rajaka)
                            <div class="slider-item">
                                <a href="{{ asset($rajaka->image) }}" data-fancybox="tamu/images"
                                    data-caption="Caption for this image"><img src="{{ asset($rajaka->image) }}"
                                        alt="Image placeholder" class="img-fluid"></a>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section blog-post-entry bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h3 class="heading" data-aos="fade-up">Blog</h3>
                    <p data-aos="fade-up">kami menyiapkan artikel terbaru yang informatif, menarik, dan bermanfaat. Dari
                        tips hingga berita terkini, blog kami adalah sumber inspirasi yang selalu diperbarui.</p>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 post" data-aos="fade-up" data-aos-delay="100">
                        <div class="media media-custom d-block mb-4 h-100">
                            <a href="{{ route('blog.detail', $blog->id) }}" class="mb-4 d-block"><img
                                    src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid"></a>
                            <div class="media-body">
                                <span class="meta-post">{{ $blog->created_at->format('d M Y') }}</span>
                                <h3 class="mt-0 mb-3"><a
                                        href="{{ route('blog.detail', $blog->id) }}">{{ $blog->title }}</a></h3>
                                <p>{{ $blog->overview }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
