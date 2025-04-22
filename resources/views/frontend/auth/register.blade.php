@extends('frontend.layouts.layouts')
@section('title', 'Registrasi ' . ($configuration->title ?? ''))
@section('site-hero', 'Registrasi')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm rounded-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Buat Akun Baru</h3>

                        <form action="{{ url('registerTamuPost') }}" method="POST" id="register">
                            @csrf

                            <div class="mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required
                                    placeholder="Masukkan Nama Anda (Nama Lengkap)" autocomplete="new-name">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="Masukan Alamat Email Anda contoh@email.com" autocomplete="new-email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required placeholder="Password Minimal 8 karakter" autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required placeholder="Ulangi password" autocomplete="new-password">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-secondary btn-lg">Registrasi</button>
                            </div>
                        </form>

                        <div class="mt-4 text-center">
                            <p>Sudah punya akun? <a href="{{ route('loginTamu') }}">Login di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('anchor'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const el = document.querySelector("{{ session('anchor') }}");
                if (el) {
                    el.scrollIntoView({
                        behavior: "smooth"
                    });
                }
            });
        </script>
    @endif
@endsection
