<?php

namespace App\Http\Controllers\Content;

use App\Models\Genre;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('submit', 'edit', 'update', 'destroy');
    }

    public function index()
    {
        $artists = Artist::with('albums')->get();
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
            'website' => 'required|url'
        ]);

        Artist::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'website' => $request->website,
            'slug' => Str::of($request->name)->slug('-')
        ]);

        return redirect()->route('artists')->with('status', 'A new artist has been created!');
    }

    public function show(Artist $artist)
    {
        $artist = Artist::with('genres', 'albums')->findOrFail($artist->id);
        return view('artist.show', [
            'artist' => $artist
        ]);
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
            'pic' => 'image|nullable|mimes:png,jpg,jpeg|max:2048',
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
        return redirect('/artist/' . $artist->slug)->with('status', 'The artist has been updated.');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect('artists')->with('status', 'The artist has been deleted.');
    }
}
