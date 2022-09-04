<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Tag;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Str;
use App\Models\User;

class StoreController extends Controller
{
    /**
     * 投稿の保存
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(BookRequest $request, Book $book)
    {
        $this->authorize('create', $book);

        $book->fill($request->except('body'));

        $linkify = new \Misd\Linkify\Linkify();
        $book->body = $linkify->process($request->body);
        $book->user_id = $request->user()->id;

        do {
            $code = Str::random(15);
        } while (Book::where('code', $code)->exists());
        $book->code = $code;
        $book->save();

        $request->tags->each(function ($tagName) use ($book) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $book->tags()->attach($tag);
        });

        return redirect()
            ->route('users.show', ['username' => $book->user->username])
            ->withSuccess("投稿しました！");
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}
