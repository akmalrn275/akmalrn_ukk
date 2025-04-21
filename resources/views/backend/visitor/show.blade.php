@extends('backend.layouts.layouts')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Detail Visitor</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Visitor</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Detail</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Visitor Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Category:</strong> {{ $visitor->categoryService->name }}
                            </div>
                            <div class="mb-3">
                                <strong>Name:</strong> {{ $visitor->user->name }}
                            </div>
                            <div class="mb-3">
                                <strong>Email:</strong> {{ $visitor->user->email }}
                            </div>
                            <div class="mb-3">
                                <strong>Check In:</strong> {{ $visitor->check_in_date }}
                            </div>
                            <div class="mb-3">
                                <strong>Check Out:</strong> {{ $visitor->check_out_date }}
                            </div>
                            <div class="mb-3">
                                <strong>Guest Count:</strong> {{ $visitor->guest_count }}
                            </div>
                            <div class="mb-3">
                                <strong>Payment Method:</strong> {{ $visitor->payment_method }}
                            </div>
                            <div class="mb-3">
                                <strong>Payment Status:</strong> {{ $visitor->payment_status }}
                            </div>
                            <div class="mb-3">
                                <strong>Status:</strong> {{ $visitor->status }}
                            </div>
                            <div class="mb-3">
                                <strong>Special Requests:</strong> {{ $visitor->special_requests }}
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('visitor.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
