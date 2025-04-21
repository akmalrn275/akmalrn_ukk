@extends('backend.layouts.layouts')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit gallery</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('gallery.index') }}">Gallery</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Gallery</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('gallery.update', $gallery->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="image">Upload Image</label>
                                            <input id="image" type="file"
                                                class="form-control @error('image') is-invalid @enderror" name="image"
                                                onchange="previewImage('image', 'imagePreview')">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                            @if ($gallery->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset($gallery->image) }}" alt="Current gallery Image"
                                                        class="img-thumbnail" width="200">
                                                </div>
                                            @endif
                                            <img id="imagePreview" src="#" alt="Image Preview"
                                                class="img-thumbnail mt-2" style="display: none; width: 200px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
