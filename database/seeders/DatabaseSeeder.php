<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\RatingSeeder;
use Database\Seeders\BookCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AuthorSeeder::class);
        $this->call(BookCategorySeeder::class);
        $this->call(BookSeeder::class);
        $this->call(RatingSeeder::class);
    }
}
