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
            'artists' => $this->artists->getArtistList(42)
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
        return redirect('/admin/artists')->with('success', 'Artist successfully created.');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Inertia\Response
     */
    public function edit(Artist $artist): Response
    {
        return Inertia::render('Admin/EditArtist', [
            'artist' => Artist::findOrFail($artist->id)
        ]);
    }

    public function update(Artist $artist, StoreArtistRequest $request)
    {
        if ($request->validated()) {
            if ($request->hasFile('pic')) {
                $artist->update(
                    collect($request->validated())
                        ->merge(['pic' => $request->pic->store('uploads/artist')])
                        ->toArray()
                );
                return redirect(route('artist.list'))->with('success', 'Artist successfully updated!');
            }
        }

        $artist->update(array_filter($request->validated()));
        return redirect(route('artist.list'))->with('success', 'Artist successfully updated!');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect(route('artist.list'))->with('success', 'Artist has been deleted!');
    }
}
