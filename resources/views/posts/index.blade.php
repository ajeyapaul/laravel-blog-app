@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Posts</h2>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary">Create New Post</a>
        </div>
    </div>

    <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search posts" name="search" value="{{ request()->query('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    @if ($posts->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    {{ $posts->appends(request()->query())->links() }}

    @else
    <p>No posts found.</p>
    @endif
</div>
@endsection