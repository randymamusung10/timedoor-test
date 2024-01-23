<?php

namespace Database\Seeders;

use App\Models\Rating;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 500000; $i++) {
            Rating::create([
                'book_id'           => $faker->numberBetween(1, 1000),
                'rating'            => $faker->randomFloat(1, 1, 10),
            ]);
        }
    }
}
