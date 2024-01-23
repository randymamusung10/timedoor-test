<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            Author::create([
                'author_name' => $faker->name,
            ]);
        }
    }
}
