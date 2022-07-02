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
        $book = Book::find($book->id); // 特定の本のidを取得
        $chapters = $book->chapters()->orderBy('created_at', 'desc')->get(); // 新しい順でチャプターを取得
        $counts = count($chapters); // 話数の番号

        return view('books.show', [
            'book' => $book,
            'chapters' => $chapters,
            'counts' => $counts
        ]);
    }
}
