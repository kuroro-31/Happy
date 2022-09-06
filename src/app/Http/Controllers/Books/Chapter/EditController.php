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
     * $chapterにはチャプターコードが入ってきてます
     */
    public function __invoke($book, $chapter)
    {
        $chapter = Chapter::where('code', $chapter)->first();
        return view('books.chapter.edit', compact('chapter'));
    }
}
