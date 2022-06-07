<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use App\Http\Requests\ArticleRequest;

class UpdateController extends Controller
{
    /**
     * 記事の更新
     * ポリシー(src/app/Policies/ArticlePolicy.php)
     */
    public function __invoke(ArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);
        
        $article->fill($request->except('body'));
        $linkify = new \Misd\Linkify\Linkify();
        $article->body = $linkify->process($request->body);

        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });
        $article->save();

        return redirect()->route('articles.index');
    }
}
