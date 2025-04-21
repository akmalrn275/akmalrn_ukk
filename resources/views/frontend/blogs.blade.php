@extends('frontend.layouts.layouts')
@section('title', 'Blog ' . ($configuration->title ?? ''))
@section('site-hero', 'Blog')
@section('content')
    <section class="section blog-post-entry bg-light" id="next">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 post mb-5" data-aos="fade-up" data-aos-delay="100">
                    <div class="media media-custom d-block mb-4 h-100">
                        <a href="{{ route('blog.detail', $blog->id) }}" class="mb-4 d-block"><img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                                class="img-fluid"></a>
                        <div class="media-body">
                            <span class="meta-post">{{ $blog->created_at->format('d M Y') }}</span>
                            <h2 class="mt-0 mb-3"><a href="{{ route('blog.detail', $blog->id) }}">{{ $blog->title }}</a>
                            </h2>
                            <p>{{ $blog->overview }}</p>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            <div class="row" data-aos="fade">
                <div class="col-12">
                    <div class="custom-pagination">
                        <ul class="list-unstyled d-flex justify-content-center">
                            @if ($blogs->onFirstPage())
                                <li class="disabled"><span>&laquo;</span></li>
                            @else
                                <li><a href="{{ $blogs->previousPageUrl() }}">&laquo;</a></li>
                            @endif

                            @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                                @if ($i == $blogs->currentPage())
                                    <li class="active"><span>{{ $i }}</span></li>
                                @else
                                    <li><a href="{{ $blogs->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endfor

                            @if ($blogs->hasMorePages())
                                <li><a href="{{ $blogs->nextPageUrl() }}">&raquo;</a></li>
                            @else
                                <li class="disabled"><span>&raquo;</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
