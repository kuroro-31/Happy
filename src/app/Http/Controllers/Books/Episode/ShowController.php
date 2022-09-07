<?php

namespace App\Http\Controllers\Books\Episode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Book;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($book, $episode)
    {
        $story = episode::where('code', $episode)->first();
        $book = Book::where('code', $book)->first();
        return view('books.episode.show', [
            'book' => $book,
            'episode' => $story,
        ]);
    }
}
