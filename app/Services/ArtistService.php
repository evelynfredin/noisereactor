<?php

namespace App\Services;

use App\Http\Resources\ArtistResource;
use App\Models\Artist;

class ArtistService
{
    public function getArtistList(int $max)
    {
        $artists = Artist::withCount('albums')
            ->orderBy('name')
            ->paginate($max);

        return ArtistResource::collection($artists);
    }
}
