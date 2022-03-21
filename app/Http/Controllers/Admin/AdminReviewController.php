<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Models\Album;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AdminReviewController extends Controller
{
    /**
     * Handle the incoming request
     *
     * @return \Inertia\Response
     */
    public function create(Album $album): Response
    {
        return Inertia::render('Admin/CreateReview', [
            'album' => $album
        ]);
    }

    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreReviewRequest $request): RedirectResponse
    {
        Review::create($request->validated());
        return redirect(route('album.list'))
            ->with('success', 'Review added successfully!');
    }
}
