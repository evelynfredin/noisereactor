<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Inertia\Response;
use App\Services\AlbumService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Label;

class AdminAlbumController extends Controller
{
    public function __construct(
        private AlbumService $albums
    ) {
    }

    /**
     * Handle the incoming request
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        return Inertia::render('Admin/AlbumList', [
            'albums' => $this->albums->getAlbumList(['artist', 'review'], 48)
        ]);
    }

    /**
     * Handle the incoming request
     *
     * @return \Inertia\Response
     */
    public function create(): Response
    {
        return Inertia::render('Admin/CreateAlbum', [
            'artists' => Artist::get(),
            'labels' => Label::get(),
        ]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAlbumRequest $request)
    {
        Album::create($request->validated());
        return redirect('/admin/albums')
            ->with('success', 'Album successfully created.');
    }
}
