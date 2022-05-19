<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ShowController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * 記事の詳細
     */
    public function __invoke(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
}
