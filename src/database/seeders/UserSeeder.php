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
        User::create([
            'name' => env('TEST_USERNAME'),
            'username' => env('TEST_USER_CODENAME'),
            'email' => env('TEST_USER_EMAIL'),
            'password' => env('TEST_USER_PASSWORD'),
        ]);

        User::factory(500)->create();
    }
}
