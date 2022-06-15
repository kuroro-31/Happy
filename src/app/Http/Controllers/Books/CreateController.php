<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;

class CreateController extends Controller
{
    /**
     * 記事の作成
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Book $book)
    {
        $this->authorize('create', $book);
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('books.create', [
            'allTagNames' => $allTagNames,
        ]);
    }
}
