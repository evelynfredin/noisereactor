<?php

namespace App\Http\Controllers\Admin;

use Arr;
use Inertia\Inertia;
use App\Models\Album;
use App\Models\Label;
use Inertia\Response;
use App\Models\Artist;
use App\Services\AlbumService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreAlbumRequest;

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

    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Album  $album
     * @return \Inertia\Response
     */
    public function edit(Album $album): Response
    {
        return Inertia::render('Admin/EditAlbum', [
            'album' => Album::findOrFail($album->id)
        ]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \App\Models\Album  $album
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Album $album, StoreAlbumRequest $request): RedirectResponse
    {
        if ($request->hasFile('cover')) {
            $album->update(
                collect($request->validated())
                    ->merge(['cover' => $request->cover->store('uploads/albums')])
                    ->toArray()
            );
            return redirect(route('album.list'))->with('success', 'Album successfully updated!');
        }

        $album->update(array_filter($request->validated()));
        return redirect(route('album.list'))->with('success', 'Album successfully updated!');
    }
}
