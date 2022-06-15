<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $username)
    {
        $user = User::where('username', $username)->first();

        $books = $user->books()->latest()->paginate(20);

        return view('users.about', compact('user', 'books'));
    }
}
