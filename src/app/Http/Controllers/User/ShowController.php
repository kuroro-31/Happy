<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $name)
    {
        $user = User::where('name', $name)->first();

        $articles = $user->articles()->latest()->paginate(20);

        return view('users.show', compact('user', 'articles'));
    }
}
