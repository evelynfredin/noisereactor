<?php

namespace App\Http\Controllers\Content;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'excerpt' => 'required|string',
            'body' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'slug' => Str::of($request->title)->slug('-')
        ]);

        return redirect()->route('posts')->with('status', 'A new blog post has been created!');
    }

    public function submit()
    {
        return view('post.new');
    }

    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'excerpt' => 'required|string',
            'body' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ]);

        return redirect('/blog/' . $post->slug)->with('status', 'Your blog post has been updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('blog')->with('status', 'The blog post has been deleted!');
    }
}
