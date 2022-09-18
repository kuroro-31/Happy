<?php

namespace App\Http\Controllers\Books\Episode\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        // 作成後のページ遷移に必要なのでidを渡す
        // return response()->json([
        //     'episode_id' => $episode->id,
        // ]);
        return redirect()->back();
    }
}
