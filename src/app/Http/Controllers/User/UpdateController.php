<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
// use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UpdateController extends Controller
{
    /**
     * 記事の更新
     * ポリシー(src/app/Policies/ArticlePolicy.php)
     */
    public function __invoke(Request $request, User $user)
    {
        $user = Auth::user();
        $user->body = $request->body;
        $user->website = $request->website;
        if($request->hasFile('avator')){
            $filename = $request->avator->getClientOriginalName();
            $request->avator->storeAs('img',$filename,'public');
            Auth()->user()->update(['avator'=>$filename]);
        }
        if($request->hasFile('thumbnail')){
            $filename = $request->thumbnail->getClientOriginalName();
            $request->thumbnail->storeAs('img',$filename,'public');
            Auth()->user()->update(['thumbnail'=>$filename]);
        }
        $user->save();

        return redirect()->back();
    }
}
