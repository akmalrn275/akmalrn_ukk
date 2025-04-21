@extends('frontend.layouts.layouts')
@section('title', 'Kontak ' . ($configuration->title ?? ''))
@section('site-hero', 'Kontak')
@section('content')
    <section class="section contact-section" id="next">
        <div class="container">
            <div class="row">
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">

                    <iframe src="{{ $configuration->map ?? '' }}" width="100%" height="400" style="border:0;"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="row">
                        <div class="col-md-10 ml-auto contact-info">
                            <p><span class="d-block">Alamat:</span> <span>{{ $configuration->address ?? '' }}</span></p>
                            <p><span class="d-block">Telepon:</span> <span>{{ $configuration->phone_number ?? '' }}</span>
                            </p>
                            <p><span class="d-block">Email:</span> <span>{{ $configuration->email_address ?? '' }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
