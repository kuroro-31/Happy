<?php

namespace App\Http\Controllers\Books\Chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use Faker\Core\Number;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($book, $chapter)
    {
        $chapter = Chapter::find($chapter);
        return view('books.chapter.edit', compact('chapter'));
    }
}
