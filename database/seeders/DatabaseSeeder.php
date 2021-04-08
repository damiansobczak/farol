<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            PostSeeder::class,
            SliderSeeder::class,
            RealisationSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ColorSeeder::class,
            CollectionSeeder::class,
            MaterialSeeder::class,
        ]);
    }
}
