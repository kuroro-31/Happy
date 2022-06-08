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
        $articles = Article::with('user')->latest()->paginate(20);
        // ->load(['user', 'likes', 'tags']);
        return view('articles.index', compact ('articles'));
    }
}
