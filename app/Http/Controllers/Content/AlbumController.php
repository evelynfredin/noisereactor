<?php

namespace App\Http\Controllers\Content;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\Markdown\Facades\Markdown;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('submit');
    }

    public function index()
    {
        $albums = Album::with('artist')->latest()->paginate(15);
        return view('album.index', [
            'albums' => $albums
        ]);
    }

    public function submit(Artist $artists)
    {
        $artists = Artist::orderBy('name')->get();
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

    public function show(Album $album)
    {
        $album = Album::with('artist')->findOrFail($album->id);
        $discography = Album::where('artist_id', '=', $album->artist_id)->where('id', '!=', $album->id)->get();
        return view('album.show', [
            'album' => $album,
            'discography' => $discography,
        ]);
    }

    public function edit(Album $album)
    {
        return view('album.edit', [
            'album' => $album
        ]);
    }

    public function update(Album $album, Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'edition' => 'string|required',
            'description' => 'string|required',
            'released_at' => 'nullable|date',
            'review' => 'nullable',
            'cover' => 'image|nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->cover !== null) {
            $album->update([
                'name' => $request->name,
                'edition' => $request->edition,
                'description' => $request->description,
                'released_at' => $request->released_at,
                'cover' => $request->cover->store('uploads/albums')
            ]);
        } else {
            $album->update([
                'name' => $request->name,
                'edition' => $request->edition,
                'description' => $request->description,
                'released_at' => $request->released_at,
                'review' => $request->review
            ]);
        }
        return redirect('/album/' . $album->id)->with('status', 'The album has been updated!');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect('albums')->with('status', 'The album has been deleted!');
    }
}
