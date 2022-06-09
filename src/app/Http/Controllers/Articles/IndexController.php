<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * トップページ
     */
    public function __invoke(Request $request)
    {
        // $articles = Article::with('user')->latest()->paginate(20);
        
        // フォロー中ユーザーの投稿を返す
        $articles = Article::query()->whereIn('user_id', Auth::user()->followings()->pluck('followee_id'))->latest()->paginate(20);
        return view(
            'articles.index',
            compact ('articles')
        );
    }
}
