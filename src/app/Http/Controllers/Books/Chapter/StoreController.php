<?php

namespace App\Http\Controllers\Books\Chapter;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Chapter $chapter)
    {
        $chapter->name = $request->name;
        $chapter->book_id = $request->book_id;
        $chapter->save();
    }
}
