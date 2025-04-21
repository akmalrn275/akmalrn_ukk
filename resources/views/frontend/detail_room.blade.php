@extends('frontend.layouts.layouts')
@section('title', 'Kamar | ' . ($room->name ?? ''))
@section('site-hero', 'Detail Kamar')
@section('content')
    <section class="section bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-7">
                    <h2 class="heading" data-aos="fade">Penawaran Hebat</h2>
                    <p data-aos="fade">
                        Kami menyediakan berbagai pilihan kamar yang nyaman dan sesuai dengan kebutuhan Anda.
                        Setiap kamar dirancang dengan desain modern, fasilitas lengkap, serta suasana yang tenang untuk
                        memastikan pengalaman menginap yang menyenangkan.
                    </p>
                </div>
            </div>

            <div class="site-block-half d-block d-lg-flex bg-white" data-aos="fade" data-aos-delay="100">
                <div class="row">
                    <div class="image">
                        <a href="#">
                            <img src="{{ asset($room->image) }}" alt="{{ $room->name }}" class="img-fluid w-100 rounded">
                        </a>
                    </div>                                   
                <div class="text">
                    <span class="d-block mb-4">
                        <span class="display-4 text-primary">Rp {{ number_format($room->price, 0, ',', '.') }} /
                            Malam</span>
                    </span>
                    <h2 class="mb-4">{{ $room->name }}</h2>
                    <p>{{ $room->overview }}</p>
                    <p>
                        <a href="#FormBookingHotelInSituGarutSyariah">
                            <button id="showBookingForm" class="btn btn-primary text-white">
                                Pesan Sekarang
                            </button>
                        </a>
                    </p>
                </div>
            </div>
            </div>

            {!! $room->description !!}

            <h4>Status Hari Ini:
                <span class="{{ $room->serviceStatus == 'Tersedia' ? 'text-success' : 'text-danger' }}">
                    {{ $room->serviceStatus }}
                </span>
            </h4>

            <h5 class="mt-4">Tanggal Tersedia:</h5>
            <ul>
                @forelse ($availableDates as $date)
                    <li>{{ \Carbon\Carbon::parse($date)->translatedFormat('l, d F Y') }}</li>
                @empty
                    <li><em>Tidak ada tanggal tersedia dalam 14 hari ke depan.</em></li>
                @endforelse
            </ul>

            <div class="row">
                <div class="col-md-12">
                    <div class="home-slider major-caousel owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($image as $rajaka)
                            <div class="slider-item">
                                <a href="{{ asset($rajaka->image) }}" data-fancybox="tamu/images"
                                    data-caption="Caption for this image"><img src="{{ asset($rajaka->image) }}"
                                        alt="Image placeholder" class="img-fluid"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div id="bookingFormContainer" style="display: none;">
                <div class="card p-4 mt-4">
                    <h5 class="mb-3">Form Booking</h5>
                    <form action="{{ route('booking.store') }}" method="POST" id="FormBookingHotelInSituGarutSyariah">
                        @csrf
                        <input type="hidden" name="category_service_id" value="{{ $room->id }}">
                        <div class="mb-3">
                            <label for="check_in_date" class="form-label">Check-in</label>
                            <input type="date" class="form-control" id="check_in_date" name="check_in_date" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="mb-3">
                            <label for="check_out_date" class="form-label">Check-out</label>
                            <input type="date" class="form-control" id="check_out_date" name="check_out_date" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="mb-3">
                            <label for="guest_count" class="form-label">Jumlah Orang</label>
                            <input type="number" class="form-control" id="guest_count" name="guest_count" min="1"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Metode Pembayaran</label>
                            <select class="form-control" id="payment_method" name="payment_method" required>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="special_requests" class="form-label">Ada request?</label>
                            <textarea class="form-control" id="special_requests" name="special_requests" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Konfirmasi Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById("showBookingForm").addEventListener("click", function (e) {
            e.preventDefault();

            let formContainer = document.getElementById("bookingFormContainer");

            if (formContainer.style.display === "none" || formContainer.style.display === "") {
                formContainer.style.display = "block";

                setTimeout(() => {
                    formContainer.scrollIntoView({ behavior: "smooth" });
                }, 100);
            } else {
                formContainer.style.display = "none";
            }
        });
    </script>
@endsection
