<?php

namespace App\Http\Controllers\Content;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Genre;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('submit', 'edit', 'update');
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

    public function show(Artist $artist)
    {
        $artist = Artist::with('genres')->findOrFail($artist->id);
        return view('artist.show', [
            'artist' => $artist
        ]);
    }

    public function uid($name)
    {
        $name = $this->name;

        return strtolower(str_replace('%20', '-', $name));
    }

    public function edit(Artist $artist)
    {
        return view('artist.edit', [
            'artist' => $artist
        ]);
    }

    public function update(Artist $artist, Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'website' => 'url|nullable',
            'bio' => 'string|nullable',
            'slug' => 'string|required',
            'pic' => 'image|nullable|mimes:png,jpg,jpeg',
        ]);

        if ($request->pic !== null) {
            $artist->update([
                'name' => $request->name,
                'website' => $request->website,
                'bio' => $request->bio,
                'slug' => $request->slug,
                'pic' => $request->pic->store('uploads/artist')
            ]);
        } else {
            $artist->update([
                'name' => $request->name,
                'website' => $request->website,
                'bio' => $request->bio,
                'slug' => $request->slug,
            ]);
        }
        return redirect('/artist/' . $artist->slug)->with('status', 'Artist has been updated.');
    }
}
