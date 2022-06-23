<?php

namespace App\Http\Controllers\Books\Chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $book, string $chapter)
    {
        $story = Chapter::where('id', $chapter)->first();
        return view('books.chapter.show', [
            'chapter' => $story,
        ]);
    }
}
