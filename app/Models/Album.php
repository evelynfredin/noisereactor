<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'edition',
        'description',
        'artist_id',
        'cover',
        'released-_at'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
