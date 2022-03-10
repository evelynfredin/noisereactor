<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Inertia\Inertia;
use Inertia\Response;

class AlbumController extends Controller
{
    /**
     * Handle the incoming request
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $albums = Album::latest()->with(['artist'])->paginate(45);

        return Inertia::render('Site/Albums')
            ->with('albums', AlbumResource::collection($albums));
    }

    /**
     * Handle the incoming request
     * @param \App\Models\Album  $album
     * @return \Inertia\Response
     */
    public function show(Album $album): Response
    {
        return Inertia::render('Site/ShowAlbum', [
            'album' => Album::with(['artist', 'label', 'review'])->findOrFail($album->id),
            'discography' => Album::where('artist_id', '=', $album->artist_id)
                ->where('id', '!=', $album->id)
                ->get()
        ]);
    }

    /**
     * Handle the incoming request
     *
     * @return \Inertia\Response
     */
    public function anniversary(): Response
    {
        $getCurrentMonth = '%-' . date('m') . '-%';
        return Inertia::render('Site/Anniversary', [
            'albumsWithBirthMonth' => Album::with('artist')->where('released_date', 'LIKE', $getCurrentMonth)
                ->latest()
                ->get()
        ]);
    }
}
