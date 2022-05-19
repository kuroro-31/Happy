<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;

class CreateController extends Controller
{
    /**
     * 記事の作成
     */
    public function __invoke()
    {
        // $allTagNames = Tag::all()->map(function ($tag) {
        //     return ['text' => $tag->name];
        // });

        // return view('articles.create', [
        //     'allTagNames' => $allTagNames,
        // ]);
        return view('articles.create');
    }
}
