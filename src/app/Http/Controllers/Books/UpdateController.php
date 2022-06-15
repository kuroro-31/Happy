<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use App\Http\Requests\BookRequest;

class UpdateController extends Controller
{
    /**
     * 記事の更新
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(BookRequest $request, Book $book)
    {
        $this->authorize('update', $book);
        
        $book->fill($request->except('body'));
        $linkify = new \Misd\Linkify\Linkify();
        $book->body = $linkify->process($request->body);

        $book->tags()->detach();
        $request->tags->each(function ($tagName) use ($book) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $book->tags()->attach($tag);
        });
        $book->save();

        return redirect()->route('book.index');
    }
}
