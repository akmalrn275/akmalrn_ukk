@extends('frontend.layouts.layouts')    
@section('title', 'Kamar ' . ($configuration->title ?? ''))
@section('site-hero', 'Kamar')
@section('content')
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
@endsection
