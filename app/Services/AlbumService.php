<?php

namespace App\Services;

use App\Http\Resources\AlbumResource;
use App\Models\Album;

class AlbumService
{
    public function getAlbumList()
    {
        $albums = Album::latest()->with(['artist'])->paginate(45);

        return AlbumResource::collection($albums);
    }
}
