<?php

namespace App\Http\Controllers\Books\Chapter;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        do {
            $code = Str::random(30);
        } while (Chapter::where('code', $code)->exists());
        $chapter->code = $code;
        $chapter->save();

        // 作成後のページ遷移に必要なのでidを渡す
        return response()->json([
            'chapter_code' => $chapter->code,
        ]);
    }
}
