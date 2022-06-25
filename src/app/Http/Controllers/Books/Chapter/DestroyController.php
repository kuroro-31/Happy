<?php

namespace App\Http\Controllers\Books\Chapter;

use App\Http\Controllers\Controller;
use App\Models\Chapter;

class DestroyController extends Controller
{
    /**
     * 記事の削除
     * ポリシー(src/app/Policies/BookPolicy.php)
     */
    public function __invoke(Chapter $chapter)
    {
        // $this->authorize('delete', $chapter);
        // dd($chapter->id);
        // $chapter->id->delete();
        return redirect()->route('books.index');
    }
}
