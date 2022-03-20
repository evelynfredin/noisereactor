<?php

namespace App\Services;

use App\Http\Resources\AlbumResource;
use App\Models\Album;

class AlbumService
{
    public function getAlbumList(array $relationship, int $max)
    {
        $albums = Album::latest()->with($relationship)->paginate($max);

        return AlbumResource::collection($albums);
    }
}
