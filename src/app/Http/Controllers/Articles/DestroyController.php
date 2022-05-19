<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class DestroyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * 記事の削除
     */
    public function __invoke(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}
