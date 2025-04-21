<footer class="section footer-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-3 mb-5 text-center">
                <div style="background-color: white; display: inline-block; padding: 10px; border-radius: 8px;">
                    <img src="{{ asset($configuration->logo) }}" alt="Logo" class="img-fluid"
                        style="max-width: 150px;">
                </div>
                <h4 class="mt-3 text-white">{{ $configuration->company_name ?? '' }}</h4>
            </div>

            <div class="col-md-3 mb-5">
                <ul class="list-unstyled link">
                    <li><a href="{{ route('room') }}">Kamar</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('gallery') }}">Galeri</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                    @if (auth()->check())
                    @else
                        <li class="{{ Route::currentRouteName() == 'loginTamu' ? 'active' : '' }}">
                            <a href="{{ route('loginTamu') }}">Login</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'registerTamu' ? 'active' : '' }}">
                            <a href="{{ route('registerTamu') }}">Registrasi</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-3 mb-5 pr-md-5 contact-info">
                <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Alamat:</span>
                    <span> {{ $configuration->address ?? '' }}</span>
                </p>
                <p><span class="d-block"><span
                            class="ion-ios-telephone h5 mr-3 text-primary"></span>Telepon:</span>
                    <span>{{ $configuration->phone_number ?? '' }}</span>
                </p>
                <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span>
                    <span> {{ $configuration->email_address ?? '' }}</span>
                </p>
            </div>
            <div class="col-md-3 mb-5">
                <iframe src="{{ $configuration->map ?? '' }}" width="100%" height="300" style="border:0;"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>
        <div class="row pt-5">
            <p class="col-md-6 text-left">
                {{ $configuration->footer ?? '' }}
            </p>

            <p class="col-md-6 text-right social">
                @if ($configuration->phone_number)
                    <a href="https://wa.me/{{ $configuration->phone_number }}" target="_blank">
                        <span class="fa fa-whatsapp"></span>
                    </a>
                @endif

                @if ($configuration->email_address)
                    <a href="mailto:{{ $configuration->email_address }}">
                        <span class="fa fa-envelope"></span>
                    </a>
                @endif

                @if ($configuration->instagram)
                    <a href="{{ $configuration->instagram }}" target="_blank">
                        <span class="fa fa-instagram"></span>
                    </a>
                @endif

                @if ($configuration->youtube)
                    <a href="{{ $configuration->youtube }}" target="_blank">
                        <span class="fa fa-youtube"></span>
                    </a>
                @endif
            </p>
        </div>
    </div>
</footer>
