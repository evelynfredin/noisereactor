<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Album extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'artist_id',
        'edition',
        'label_id',
        'description',
        'released_date',
        'cover'
    ];

    public function label(): BelongsTo
    {
        return $this->belongsTo(Label::class);
    }

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
