<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Inertia\Response;
use Inertia\Inertia;

class ReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Inertia\Response
     */
    public function __invoke(): Response
    {
        return Inertia::render('Site/Reviews', [
            'reviews' => Review::with(['album.artist'])->get()
        ]);
    }
}
