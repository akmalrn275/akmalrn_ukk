@extends('backend.layouts.layouts')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DataTables</h3>
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
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-0">Add Row</h4>
                                    <form action="{{ route('visitor.index') }}" method="GET" class="d-flex">
                                        <input type="date" name="start_date" class="form-control me-2" value="{{ request('start_date') }}">
                                        <input type="date" name="end_date" class="form-control me-2" value="{{ request('end_date') }}">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </form>

                                    <form action="{{ route('visitor.index') }}" method="GET" class="d-flex">
                                        <input type="text" name="search" class="form-control me-2" placeholder="Search Name..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Guest Count</th>
                                            <th>Payment</th>
                                            <th>Pay Status</th>
                                            <th>Status</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Jumlah Tamu</th>
                                            <th>Pembayaran</th>
                                            <th>Status</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($visitors as $visitor)
                                            <tr>
                                                <td>{{ $visitor->categoryService->name }}</td>
                                                <td>{{ $visitor->user->name }}</td>
                                                <td>{{ $visitor->user->email }}</td>
                                                <td>{{ $visitor->check_in_date }}</td>
                                                <td>{{ $visitor->check_out_date }}</td>
                                                <td>{{ $visitor->guest_count }}</td>
                                                <td>{{ $visitor->payment_method }}</td>
                                                <td>{{ $visitor->payment_status }}</td>
                                                <td>{{ $visitor->status }}</td>
                                                <td>
                                                    <form action="{{ route('visitor.show', $visitor->id) }}" method="GET" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" data-bs-toggle="tooltip" title="Lihat Detail" class="btn btn-link btn-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </form>

                                                    @if ($visitor->status !== 'Cancelled' && $visitor->status !== 'Completed')
                                                        <form id="completeForm-{{ $visitor->id }}"
                                                            action="{{ route('visitor.status.completed', $visitor->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="Completed">
                                                            <input type="hidden" name="payment_status" value="Paid">
                                                            <button type="button" data-bs-toggle="tooltip" title="Tandai Selesai"
                                                                class="btn btn-link btn-success"
                                                                onclick="confirmComplete({{ $visitor->id }})">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if ($visitor->status !== 'Cancelled' && $visitor->status !== 'Completed')
                                                    <form id="cancelForm-{{ $visitor->id }}"
                                                        action="{{ route('visitor.status.cancelled', $visitor->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="status" value="Cancelled">
                                                        <input type="hidden" name="payment_status" value="Failed">
                                                        <button type="button" data-bs-toggle="tooltip" title="Batalkan"
                                                            class="btn btn-link btn-danger btn-cancel"
                                                            data-id="{{ $visitor->id }}">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $visitors->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
