<?php

namespace App\Http\Controllers\Content;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view('post.show', [
            'post' => $post
        ]);
    }
}
