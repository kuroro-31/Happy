<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    protected $fillable = [
        'book_id',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo('App\Models\Book');
    }

    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }
}
