<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'website',
        'slug',
        'pic'
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query
            ->where('name', 'like', '%' . $search . '%'));
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'artist_genre')->using(ArtistGenre::class);
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
