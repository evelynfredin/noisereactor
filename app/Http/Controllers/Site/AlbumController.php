<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
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
        return Inertia::render('Site/Albums', [
            'albums' => Album::latest()
                ->with('artist')
                ->get()
        ]);
    }

    /**
     * Handle the incoming request
     * @param \App\Models\Album  $album
     * @return \Inertia\Response
     */
    public function show(Album $album): Response
    {
        return Inertia::render('Site/ShowAlbum', [
            'album' => Album::with(['artist', 'label'])->findOrFail($album->id)
        ]);
    }
}
