<?php

namespace App\Http\Controllers\Pages;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $posts = Post::latest();

        if ($search) {
            $posts->where('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
        }

        $posts = $posts->paginate(12);

        return view('pages.blog', compact('posts'));
    }

    /**
     * Display specified post.
     *
     * @return \Illuminate\Http\Response
     */
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $previousPost = Post::where('created_at', '<', $post->created_at)->orderBy('created_at', 'desc')->first();
        $nextPost = Post::where('created_at', '>', $post->created_at)->orderBy('created_at', 'asc')->first();

        return view('posts.preview', compact('post', 'previousPost', 'nextPost'));
    }
}
