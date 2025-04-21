@extends('frontend.layouts.layouts')
@section('title', 'Reset Password ' . ($configuration->title ?? ''))
@section('site-hero', 'Reset Password')
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

                        <form method="POST" action="/reset-password">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" required placeholder="Password baru">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Ulangi Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" required placeholder="Ulangi password">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
