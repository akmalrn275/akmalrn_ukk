@extends('frontend.layouts.layouts')
@section('title', 'Blog | ' . ($blog->title ?? ''))
@section('site-hero', 'Detail Blog')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    @if ($blog->image)
                        <img src="{{ asset($blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                    @endif
                    <div class="card-body">
                        <h1 class="card-title">{{ $blog->title }}</h1>
                        <p class="text-muted">Diposting pada {{ $blog->created_at->format('d M Y') }}</p>
                        <p class="card-text">{!! $blog->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Cari Blog</h5>
                        <input type="text" id="search" class="form-control" placeholder="Cari blog..."
                            autocomplete="off">
                        <ul class="list-group mt-2" id="search-results"></ul>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Blog Terbaru</h5>
                        <ul class="list-unstyled">
                            @foreach ($latestBlogs as $latest)
                                <li class="list-group-item d-flex align-items-center">
                                    <img src="{{ asset($latest->image) }}" alt="Thumbnail"  class="rounded mr-2" style="width: 50px; height: 50px; object-fit: cover;"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <a href="{{ route('blog.detail', $latest->id) }}" class="text-decoration-none">
                                            <strong>{{ Str::limit($latest->title, 50) }}</strong>
                                        </a>
                                        <br>
                                        <small class="text-muted">{{ $latest->created_at->format('d M Y') }}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let route = @json(route('blog.search'));

            function fetchBlogs(query = '') {
                let searchResults = $('#search-results');
                searchResults.html('<li class="list-group-item text-muted">Mencari...</li>');

                $.ajax({
                    url: route,
                    type: "GET",
                    data: {
                        query: query
                    },
                    dataType: "json",
                    success: function(response) {
                        searchResults.empty();
                        if (response.length > 0) {
                            response.forEach(function(blog) {
                                let imageUrl = blog.image ? blog.image :
                                    'default-thumbnail.jpg';
                                searchResults.append(
                                    `<li class="list-group-item d-flex align-items-center">
                                    <img src="${imageUrl}" alt="Thumbnail" class="rounded mr-2" style="width: 50px; height: 50px; object-fit: cover;">
                                    <a href="/blog/${blog.id}" class="text-decoration-none ml-2">${blog.title.length > 50 ? blog.title.substring(0, 50) + '...' : blog.title}<br> <small class="text-muted">${blog.created_at}</small></a>
                                </li>`
                                );
                            });
                        } else {
                            searchResults.append(
                                '<li class="list-group-item text-muted">Tidak ditemukan</li>');
                        }
                    },
                    error: function(xhr) {
                        searchResults.html(
                            '<li class="list-group-item text-danger">Terjadi kesalahan</li>');
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#search').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    fetchBlogs(query);
                } else {
                    $('#search-results').empty();
                }
            });

            $('#search').on('focus', function() {
                fetchBlogs();
            });
        });
    </script>
@endsection
