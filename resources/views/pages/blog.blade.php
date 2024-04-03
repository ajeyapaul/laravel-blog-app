@extends('layouts.site')

@section('content')
<div class="container">
    <h2 class="mb-4">Blog</h2>

    <div class="row">
        @forelse ($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">{{ $post->title }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ Str::limit($post->content, 250) }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('blog.post', $post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <p>No posts found.</p>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div>
</div>
@endsection