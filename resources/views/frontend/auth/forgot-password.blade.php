@extends('frontend.layouts.layouts')
@section('title', 'Lupa Password ' . ($configuration->title ?? ''))
@section('site-hero', 'Lupa Password')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-3">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">Reset Password</h4>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="/forgot-password">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukkan email kamu" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Kirim Link Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
