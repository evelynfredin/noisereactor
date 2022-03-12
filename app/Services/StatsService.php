<?php

namespace App\Services;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Label;

class StatsService
{
    public function getAppStats()
    {
        return $stats = [
            0 => [
                'id' => 1,
                'stat' => 'Albums',
                'count' => Album::count(),
            ],
            1 => [
                'id' => 2,
                'stat' => 'Artists',
                'count' => Artist::count(),
            ],
            2 => [
                'id' => 3,
                'stat' => 'Genres',
                'count'  => Genre::count(),
            ],
            3 => [
                'id' => 4,
                'stat' => 'Deluxe Boxes',
                'count' => Album::where('edition', 'like', '%Deluxe%')->count(),
            ],
            4 => [
                'id' => 5,
                'stat' => 'Labels',
                'count' => Label::count()
            ]
        ];
    }
}
