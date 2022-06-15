<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(100)->create();

        $faker = Faker::create('en_US');
        for($i = 1; $i < 100; $i++){
            \App\Models\Book::create([
                'title' => $faker->text,
                'body' => $faker->sentence,
                'user_id' => random_int(1, 100)
            ]);
        }
    }
}
