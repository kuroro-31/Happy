<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(string $name)
    {
        $tag = Tag::where('name', $name)->latest()->first();

        return view('tags.show', ['tag' => $tag]);
    }
}
