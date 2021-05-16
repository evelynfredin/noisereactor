<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $month = '%-' . date('m') . '-%';

        return view('index', [
            'albums' => Album::with('artist')->latest()->limit(3)->get(),
            'annivRelease' => Album::where('released_at', 'LIKE', $month)->get(),
            'posts' => Post::latest()->limit(4)->get()
        ]);
    }
}
