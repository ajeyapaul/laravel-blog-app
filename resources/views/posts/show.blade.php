@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <p><strong>Author:</strong> {{ $post->user->name }}</p>
        <p><strong>Slug:</strong> {{ $post->slug }}</p>
        <p><strong>Content:</strong></p>
        <p>{{ $post->content }}</p>
        <p>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
        </p>
    </div>
@endsection
