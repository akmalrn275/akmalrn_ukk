<header class="site-header js-site-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-lg-4 site-logo" data-aos="fade"><a
                    href="index.html">{{ $configuration->company_name ?? '' }}</a></div>
            <div class="col-6 col-lg-8">

                <div class="site-menu-toggle js-site-menu-toggle" data-aos="fade">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!-- END menu-toggle -->

                <div class="site-navbar js-site-navbar">
                    <nav role="navigation">
                        <div class="container">
                            <div class="row full-height align-items-center">
                                <div class="col-md-6 mx-auto">
                                    <ul class="list-unstyled menu">
                                        <li class="{{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><a
                                                href="{{ route('index') }}">Beranda</a></li>
                                        <li class="{{ Route::currentRouteName() == 'room' ? 'active' : '' }}"><a
                                                href="{{ route('room') }}">Kamar</a></li>
                                        <li class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}"><a
                                                href="{{ route('about') }}">Tentang</a></li>
                                        <li class="{{ Route::currentRouteName() == 'gallery' ? 'active' : '' }}"><a
                                                href="{{ route('gallery') }}">Galeri</a></li>
                                        <li class="{{ Route::currentRouteName() == 'blog' ? 'active' : '' }}"><a
                                                href="{{ route('blog') }}">Blog</a></li>
                                        <li class="{{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"><a
                                                href="{{ route('contact') }}">Kontak</a></li>
                                        <ul class="navbar-nav ms-auto">
                                            @if (auth()->check())
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#"
                                                        id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        {{ auth()->user()->name }}
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="navbarDropdown">
                                                        <li>
                                                            <button type="button" class="dropdown-item"
                                                                onclick="confirmLogout()">Logout</button>
                                                        </li>
                                                    </ul>

                                                    <!-- Hidden Logout Form -->
                                                    <form id="logoutForm" action="{{ route('logoutTamuPost') }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>

                                        </ul>
                                    </ul>
                                    </li>
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
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
