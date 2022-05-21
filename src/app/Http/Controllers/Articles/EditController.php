<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class EditController extends Controller
{
    /**
     * ポリシー
     * src/app/Policies/ArticlePolicy.php
     */
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }
    
    /**
     * 記事の編集
     */
    public function __invoke(Article $article)
    {
        // $tagNames = $article->tags->map(function ($tag) {
        //     return ['text' => $tag->name];
        // });

        // $allTagNames = Tag::all()->map(function ($tag) {
        //     return ['text' => $tag->name];
        // });

        return view('articles.edit', [
            'article' => $article,
            // 'tagNames' => $tagNames,
            // 'allTagNames' => $allTagNames,
        ]);
    }
}
