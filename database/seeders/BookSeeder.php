<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100000; $i++) {
            Book::create([
                'book_title'    => $faker->sentence,
                'category_id'   => $faker->numberBetween(1, 3000),
                'author_id'     => $faker->numberBetween(1, 1000),
            ]);
        }
    }
}
