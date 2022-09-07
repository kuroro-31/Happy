<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Book $book)
    {
        \App\Models\User::factory(100)->create();

        $faker = Faker::create('en_US');
        do {
            $code = Str::random(15);
        } while (Book::where('code', $code)->exists());

        for ($a = 1; $a < 100; $a++) {
            $book->title = $faker->text(15);
            $book->code = $code;
            $book->story = $faker->sentence;
            $book->user_id = random_int(1, 100);
            $book->save();
        }

        // for ($b = 1; $b < 1000; $b++) {
        //     \App\Models\episode::create([
        //         'name' => $faker->text(15),
        //         'body' => $faker->text(1000),
        //         'book_id' => random_int(1, 100)
        //     ]);
        // }
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}
