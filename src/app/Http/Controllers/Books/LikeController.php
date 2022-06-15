<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * 記事へのいいね
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Request $request, Book $book)
    {
        $book->likes()->detach($request->user()->id);
        $book->likes()->attach($request->user()->id);

        return [
            'id' => $book->id,
            'countLikes' => $book->count_likes,
        ];
    }
}
