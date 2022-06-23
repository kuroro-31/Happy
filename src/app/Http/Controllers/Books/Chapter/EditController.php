<?php

namespace App\Http\Controllers\Books\Chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $books = Book::all();
        $chapter = Chapter::find($id);
        return view('chapter.edit', compact('chapter', 'books'));
    }
}
