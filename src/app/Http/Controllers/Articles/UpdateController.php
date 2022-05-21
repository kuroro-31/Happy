<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class UpdateController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * 記事の更新
     */
    public function __invoke(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        // $article->tags()->detach();
        // $request->tags->each(function ($tagName) use ($article) {
        //     $tag = Tag::firstOrCreate(['name' => $tagName]);
        //     $article->tags()->attach($tag);
        // });

        return redirect()->route('articles.index');
    }
}
