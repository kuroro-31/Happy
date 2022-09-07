<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    protected $fillable = [
        'title' => 'required|string|max:50',
        'body' => 'required|string|min:1000|max:1500',
        'book_id',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo('App\Models\Book');
    }
}
