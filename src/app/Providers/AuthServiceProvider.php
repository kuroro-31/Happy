<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Article;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションにマップ付されたポリシー
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Article' => 'App\Policies\ArticlePolicy',
    ];

    /**
     * アプリケーションの全認証／認可サービスの登録
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
