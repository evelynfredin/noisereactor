<?php

namespace App\Http\Controllers\Content;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('submit');
    }

    public function index()
    {
        $albums = Album::with('artist')->get();
        return view('album.index', [
            'albums' => $albums
        ]);
    }

    public function submit(Artist $artists)
    {
        $artists = Artist::get();
        return view('album.new', [
            'artists' => $artists
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'edition' => 'required|string',
            'description' => 'required',
            'artist_id' => 'required'
        ]);

        Album::create([
            'name' => $request->name,
            'edition' => $request->edition,
            'description' => $request->description,
            'artist_id' => $request->artist_id
        ]);

        return redirect()->route('albums')->with('status', 'A new abum has been added to the collection!');
    }
}
