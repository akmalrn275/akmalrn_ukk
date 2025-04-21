@extends('frontend.layouts.layouts')
@section('title', 'Tentang ' . ($configuration->title ?? ''))
@section('site-hero', 'Tentang')
@section('content')
    <section class="py-5 bg-light" id="next">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
                    <img src="{{ asset($about->image ?? '') }}" alt="Image" class="img-fluid rounded">
                </div>
                <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
                    <h2 class="heading">Tentang Kami!</h2>

                    @php
                        $description = $about->description ?? '';
                        $shortDescription = Str::limit(strip_tags($description), 300);
                    @endphp

                    <p class="mb-4" id="aboutText">{!! $shortDescription !!}</p>

                    @if (strlen(strip_tags($description)) > 300)
                        <p>
                            <a href="javascript:void(0);" class="btn btn-primary text-white py-2 mr-3" id="readMoreBtn"
                                onclick="showFullText()">Selengkapnya</a>
                            <a href="javascript:void(0);" class="btn btn-secondary text-white py-2 mr-3" id="hideTextBtn"
                                onclick="hideFullText()" style="display: none;">Sembunyikan</a>
                        </p>
                    @endif
                </div>

                <script>
                    function showFullText() {
                        document.getElementById('aboutText').innerHTML = `{!! addslashes($description) !!}`;
                        document.getElementById('readMoreBtn').style.display = 'none';
                        document.getElementById('hideTextBtn').style.display = 'inline-block';
                    }

                    function hideFullText() {
                        document.getElementById('aboutText').innerHTML = `{!! addslashes($shortDescription) !!}`;
                        document.getElementById('readMoreBtn').style.display = 'inline-block';
                        document.getElementById('hideTextBtn').style.display = 'none';
                    }
                </script>

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
                    <!-- END slider -->
                </div>

            </div>
        </div>
    </section>

    <div class="section">
        <div class="container">

            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7 mb-5">
                    <h2 class="heading" data-aos="fade">History</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @foreach ($historys as $history)
                        <div class="timeline-item" date-is='{{ $history->created_at->format('Y') }}' data-aos="fade">
                            <h3>{{ $history->title }}</h3>
                            {!! $history->description !!}
                        </div>
                    @endforeach
                </div>
            </div>


        </div>
    </div>
@endsection
