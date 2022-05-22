<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    /**
     * トップページ
     */
    public function __invoke()
    {

        $articles = Article::all()->sortByDesc('created_at')
        ->load(['user', 'likes', 'tags'])->simplePaginate(15)
        ;
        return view('articles.index', ['articles' => $articles]);
    }
}
