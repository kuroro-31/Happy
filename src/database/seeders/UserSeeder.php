<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * ユーザーのテストデータ
     */
    public function run()
    {
        // 自分
        User::create([
            'name' => env('TEST_USERNAME'),
            'username' => env('TEST_USER_CODENAME'),
            'email' => env('TEST_USER_EMAIL'),
            'password' => env('TEST_USER_PASSWORD'),
        ]);

        // サンプル
        User::factory(500)->create();
    }
}
