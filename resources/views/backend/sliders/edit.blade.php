@extends('backend.layouts.layouts')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Slider</h3>
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
                        <a href="{{ route('slider.index') }}">Slider</a>
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
                            <h4 class="card-title">Edit Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.update', $slider->id) }}" method="POST"
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

                                            @if ($slider->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset($slider->image) }}" alt="Current Slider Image"
                                                        class="img-thumbnail" width="200">
                                                </div>
                                            @endif
                                            <img id="imagePreview" src="#" alt="Image Preview"
                                                class="img-thumbnail mt-2" style="display: none; width: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ $slider->title }}" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('slider.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
