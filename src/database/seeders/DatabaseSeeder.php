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
        for ($a = 1; $a < 100; $a++) {
            \App\Models\Book::create([
                'title' => $faker->text(15),
                'body' => $faker->sentence,
                'user_id' => random_int(1, 100)
            ]);
        }

        // for ($b = 1; $b < 1000; $b++) {
        //     \App\Models\Chapter::create([
        //         'name' => $faker->text(15),
        //         'body' => $faker->text(1000),
        //         'book_id' => random_int(1, 100)
        //     ]);
        // }
    }
}
