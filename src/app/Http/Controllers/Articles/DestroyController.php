<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class DestroyController extends Controller
{
    /**
     * 記事の削除
     * ポリシー(src/app/Policies/ArticlePolicy.php)
     */
    public function __invoke(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();
        return redirect()->route('articles.index');
    }
}
