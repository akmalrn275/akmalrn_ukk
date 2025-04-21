@extends('frontend.layouts.layouts')
@section('title', 'Galeri ' . ($configuration->title ?? ''))
@section('site-hero', 'Galeri')
@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Galeri</h2>
        <div class="row">
            @foreach ($gallerys as $image)
                <div class="col-md-4 mb-4">
                    <a href="{{ asset($image->image) }}" data-fancybox="gallery" data-caption="{{ $image->title }}">
                        <img src="{{ asset($image->image) }}" alt="Galeri {{ $configuration->company_name ?? '' }}"
                            class="img-fluid gallery-img shadow" style=" object-fit: cover; width:100%; height:250px;">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("[data-fancybox='gallery']").fancybox({
                buttons: ["zoom", "slideShow", "fullScreen", "thumbs", "close"],
                loop: true,
                protect: true,
                transitionEffect: "slide",
                animationEffect: "fade"
            });
        });
    </script>
@endsection
