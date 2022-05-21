<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowController extends Controller
{
    /**
     * 記事の詳細
     * ポリシー(src/app/Policies/ArticlePolicy.php)
     */
    public function __invoke(Article $article)
    {
        $this->authorize('view', $article);

        return view('articles.show', ['article' => $article]);
    }
}
