<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
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
}
