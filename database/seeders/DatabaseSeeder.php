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
            SettingsTableSeeder::class,
            UserTableSeeder::class,
            PostSeeder::class,
            SliderSeeder::class,
            RealisationSeeder::class,
            ConditionSeeder::class,
            CategorySeeder::class,
            AttributeTypeSeeder::class,
            AttributeGroupSeeder::class,
            AttributesSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
