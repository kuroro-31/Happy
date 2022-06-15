<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;

class ShowController extends Controller
{
    /**
     * 記事の詳細
     */
    public function __invoke(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }
}
