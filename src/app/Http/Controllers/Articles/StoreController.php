<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use App\Http\Requests\ArticleRequest;

class StoreController extends Controller
{
    /**
     * 投稿の保存
     * ポリシー(src/app/Policies/ArticlePolicy.php)
     */
    public function __invoke(ArticleRequest $request, Article $article)
    {
        $this->authorize('create', $article);

        $article->fill($request->except('body'));

        $linkify = new \Misd\Linkify\Linkify();
        $article->body = $linkify->process($request->body);
        
        $article->user_id = $request->user()->id;
        $article->save();

        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }
}
