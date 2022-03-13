<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Services\ArtistService;
use Inertia\Inertia;
use Inertia\Response;

class ArtistController extends Controller
{
    public function __construct(
        private ArtistService $artists
    ) {
    }

    /**
     * Handle the incoming request
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        return Inertia::render('Site/Artists', [
            'artists' => $this->artists->getArtistList()
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
            'artist' => Artist::with(['albums', 'genres'])->findOrFail($artist->id)
        ]);
    }
}
