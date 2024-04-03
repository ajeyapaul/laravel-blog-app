@extends('layouts.site')

@section('content')
<div class="container">
    <h2>{{ $post->title }}</h2>
    <p><strong>Author:</strong> {{ $post->user->name }}</p>
    <p><strong>Slug:</strong> {{ $post->slug }}</p>
    <p><strong>Content:</strong></p>
    <p>{{ $post->content }}</p>
    
    <div class="mt-4">
        @if ($previousPost)
        <a href="{{ route('blog.post', $previousPost->slug) }}" class="btn btn-primary">Previous</a>
        @endif
        @if ($nextPost)
        <a href="{{ route('blog.post', $nextPost->slug) }}" class="btn btn-primary ml-2">Next</a>
        @endif
    </div>

    <a href="{{ route('blog.index') }}" class="btn btn-secondary mt-4">Back to Blog</a>

</div>
@endsection