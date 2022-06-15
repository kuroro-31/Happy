<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;

class DestroyController extends Controller
{
    /**
     * 記事の削除
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Book $book)
    {
        $this->authorize('delete', $book);

        $book->delete();
        return redirect()->route('books.index');
    }
}
