<?php

namespace App\Http\Controllers\Books\Chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($book, $chapter)
    {
        $story = Chapter::where('code', $chapter)->first();
        $book = Book::where('code', $book)->first();
        return view('books.chapter.show', [
            'book' => $book,
            'chapter' => $story,
        ]);
    }
}
