@extends('frontend.layouts.layouts')
@section('title', 'Verify Email ' . ($configuration->title ?? ''))
@section('site-hero', 'Verify Email')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Verifikasi Email</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status') == 'verification-link-sent')
                            <div id="alert-success" class="alert alert-success">
                                Link verifikasi baru sudah dikirim ke email kamu!
                            </div>
                        @endif

                        <p class="mb-3">
                            Silakan cek email kamu dan klik link verifikasi untuk melanjutkan.
                        </p>

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Kirim Ulang Email Verifikasi
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
