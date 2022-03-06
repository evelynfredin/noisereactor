<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Inertia\Inertia;
use Inertia\Response;

class ArtistController extends Controller
{
    /**
     * Handle the incoming request
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        return Inertia::render('Site/Artists', [
            'artists' => Artist::withCount('albums')
                ->orderBy('name')
                ->get()
        ]);
    }

    /**
     * Handle the incoming request
     * @param \App\Models\Artist  $artist
     * @return \Inertia\Response
     */
    public function show(Artist $artist): Response
    {
        return Inertia::render('Site/ShowArtist', [
            'artist' => Artist::with(['albums'])->findOrFail($artist->id)
        ]);
    }
}
