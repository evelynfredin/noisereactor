<?php

namespace App\Http\Controllers\Content;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::get();
        return view('artist.index', [
            'artists' => $artists
        ]);
    }
}
