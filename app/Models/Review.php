<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'album_id',
        'excerpt',
        'content',
        'is_published'
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
