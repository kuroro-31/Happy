<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'episode_id',
        'user_id',
    ];

    public function episode()
    {
        return $this->belongsTo('App\Models\Episode');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
