<?php

namespace App\Http\Controllers\Books\Chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $chapters = Chapter::all();
        return view('chapter.index', compact('chapters'));
    }
}
