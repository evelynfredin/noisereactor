<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $albums = Album::with('artist')->limit(3)->get();
        return view('index', [
            'albums' => $albums
        ]);
    }
}
