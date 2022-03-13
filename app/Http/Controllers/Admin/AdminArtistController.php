<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArtistRequest;
use App\Models\Artist;
use App\Services\ArtistService;
use Inertia\Inertia;
use Inertia\Response;
use Str;

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

    /**
     * Handle the incoming request.
     *
     * @return \Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Admin/CreateArtist');
    }

    public function store(StoreArtistRequest $request)
    {
        Artist::create($request->validated());
        return redirect('/admin/artists')->with('success', 'Artist created.');
    }
}
