<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * viewAnyメソッドは、indexアクションメソッドに対応,
     * 誰でもアクセスできる
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * viewメソッドは、showアクションメソッドに対応
     * 誰でもアクセスできる
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Article $article)
    {
        return true;
    }

    /**
     * ログイン中のユーザーのIDと記事モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * ログイン中のユーザーのIDと記事モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    /**
     * ログイン中のユーザーのIDと記事モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    /**
     * ログイン中のユーザーのIDと記事モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    /**
     * ログイン中のユーザーのIDと記事モデルのユーザーIDが一致すればOK
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
