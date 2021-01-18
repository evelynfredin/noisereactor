<?php

namespace App\Http\Controllers\Content;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('submit');
    }

    public function index()
    {
        $artists = Artist::get();
        return view('artist.index', [
            'artists' => $artists
        ]);
    }

    public function submit()
    {
        return view('artist.new');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'bio' => 'required',
            'website' => 'required|url',
            'pic' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        Artist::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'website' => $request->website,
            'pic' => $request->pic->store('uploads/artist')
        ]);

        return redirect()->route('artists')->with('newartist', 'A new artist has been created!');
    }
}
