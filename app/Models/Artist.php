<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Str;

class Artist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'website',
        'slug',
        'pic'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artist) {
            $artist->slug = Str::slug($artist->name);
        });
    }

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }
}
