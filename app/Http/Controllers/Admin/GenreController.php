<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GenreController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Genres', [
            'genres' => Genre::withCount('artists')->get()
        ]);
    }
}
