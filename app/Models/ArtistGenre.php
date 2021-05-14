<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArtistGenre extends Pivot
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'genre_id'
    ];
}
