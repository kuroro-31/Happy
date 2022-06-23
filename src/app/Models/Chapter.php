<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    protected $fillable = [
        'title',
        'book_id',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo('App\Models\Book');
    }
}
