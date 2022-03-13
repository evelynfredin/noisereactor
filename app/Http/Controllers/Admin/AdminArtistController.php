<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ArtistService;
use Inertia\Inertia;
use Inertia\Response;

class AdminArtistController extends Controller
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
        return Inertia::render('Admin/ArtistList', [
            'artists' => $this->artists->getArtistList()
        ]);
    }
}
