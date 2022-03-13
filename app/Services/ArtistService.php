<?php

namespace App\Services;

use App\Http\Resources\ArtistResource;
use App\Models\Artist;

class ArtistService
{
    public function getArtistList()
    {
        $artists = Artist::withCount('albums')
            ->orderBy('name')
            ->paginate(40);

        return ArtistResource::collection($artists);
    }
}
