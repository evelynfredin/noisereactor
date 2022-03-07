<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Review;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Inertia\Response
     */
    public function __invoke(): Response
    {
        $getCurrentMonth = '%-' . date('m') . '-%';

        return Inertia::render('Site/Home', [
            'latestAlbums' => Album::with('artist')->latest()->limit(3)->get(),
            'latestReviews' => Review::with('album.artist')
                ->where('is_published', '=', true)
                ->latest()
                ->limit(4)
                ->get(),
            'albumsWithBirthMonth' => Album::where('released_date', 'LIKE', $getCurrentMonth)
                ->inRandomOrder()
                ->limit(8)
                ->get()
        ]);
    }
}
