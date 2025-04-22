@extends('backend.layouts.layouts')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Image Category Services</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#"><i class="icon-home"></i></a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Data</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Image Category Services</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4 class="card-title">Add Row</h4>
                            <button class="btn btn-primary btn-round ms-auto"
                                onclick="window.location.href='{{ route('image_category_services.create') }}'">
                                <i class="fa fa-plus"></i> Add Image
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Category Service</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($images as $image)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset($image->image) }}" alt="Gambar" style="width: 50px; height: 50px">
                                                </td>
                                                <td>{{ $image->categoryService->name}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('image_category_services.edit', $image->id) }}" class="btn btn-link btn-primary" data-bs-toggle="tooltip" title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('image_category_services.destroy', $image->id) }}" method="POST" id="delete-form-{{ $image->id }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-link btn-danger" data-bs-toggle="tooltip" title="Hapus" onclick="confirmDelete({{ $image->id }})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
