@extends('frontend.layouts.layouts')
@section('title', 'Login ' . ($configuration->title ?? ''))
@section('site-hero', 'Login')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm rounded-4">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Masuk ke Akun Anda</h3>

                        <form action="{{ url('loginTamuPost') }}" method="POST" style="margin-top: 40px">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required
                                    placeholder="Masukan Email Anda" autocomplete="new-email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" required placeholder="Masukkan Password Anda" autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-secondary btn-lg">Login</button>
                            </div>
                        </form>

                        <div class="mt-4 text-center">
                            <p>Belum punya akun? <a href="{{ route('registerTamu') }}">Daftar di sini</a></p>
                            <p><a href="{{ route('forgotPasswordTamu') }}">Lupa Password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
