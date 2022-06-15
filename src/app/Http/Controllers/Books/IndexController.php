<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * トップページ
     *
     * ログイン & 投稿 & フォロー
     */
    public function __invoke(Request $request)
    {
        $books = null;
        $likeRankings = null;

        if (Auth::user()){
            $ownPost = Book::where('user_id', Auth::user()->id)->first();
            $followed = Auth::user()->followings()->pluck('followee_id')->first();

            if((empty($ownPost)) || (empty($followed)) || (empty($ownPost) && empty($followed))){
                $likeRankings = Book::withCount('likes')
                    ->orderBy('likes_count', 'desc')
                    ->limit(10)
                    ->get();
            }

            if ((empty($ownPost) && !empty($followed)) || (!empty($ownPost))){
                $likeRankings = null;
                    $books = Book::query()
                    ->whereIn('user_id', Auth::user()->followings()->pluck('followee_id')) // フォロー中ユーザー
                    ->orWhere('user_id', Auth::user()->id) // 自分
                    ->latest() // 最新順
                    ->paginate(20);
            }
        } else {
            $likeRankings = Book::withCount('likes')
                ->orderBy('likes_count', 'desc')
                ->limit(10)
                ->get();
        }

        return view(
            'books.index',
            compact ('books', 'likeRankings')
        );
    }
}
