<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::insert(array(
            array(
                'name' => 'Niebieski',
                'color' => '#000000',
            ),
            array(
                'name' => 'Czerwony',
                'color' => '#000000',
            ),
        ));
    }
}
