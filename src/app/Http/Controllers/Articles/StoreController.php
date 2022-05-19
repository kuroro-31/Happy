<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * 投稿の保存
     */
    public function __invoke(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->user_id = $request->user()->id;
        $article->save();

        // $request->tags->each(function ($tagName) use ($article) {
            // $tag = Tag::firstOrCreate(['name' => $tagName]);
            // $article->tags()->attach($tag);
        // });

        return redirect()->route('articles.index');
    }
}
