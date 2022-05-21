<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class IndexController extends Controller
{
    /**
     * トップページ
     * ポリシー(src/app/Policies/ArticlePolicy.php)
     */
    public function __invoke(Article $article)
    {
        $this->authorize('viewAny', $article);

        $articles = Article::all()->sortByDesc('created_at')
        // ->load(['user', 'likes', 'tags'])
        ;

        return view('articles.index', ['articles' => $articles]);
    }
}
