<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LikesController extends Controller
{

    public function __invoke(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load(['likes.user', 'likes.likes', 'likes.tags']);

        $articles = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
}
