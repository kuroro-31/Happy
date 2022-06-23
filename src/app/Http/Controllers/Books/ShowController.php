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
        $chapters = Book::find($book->id)->chapters;
        return view('books.show', [
            'book' => $book,
            'chapters' => $chapters,
        ]);
    }
}
