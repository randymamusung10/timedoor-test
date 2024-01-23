<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\BookCategory;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 3000; $i++) {
            BookCategory::create([
                'category_name' => $faker->word,
            ]);
        }
    }
}
