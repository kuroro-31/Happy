<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class CreateController extends Controller
{
    /**
     * トップページ
     */
    public function __invoke()
    {
        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', compact('articles'));
    }
}
