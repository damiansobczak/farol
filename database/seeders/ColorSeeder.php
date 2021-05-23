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
                'color' => '#4287f5',
            ),
            array(
                'name' => 'Czerwony',
                'color' => '#f55442',
            ),
            array(
                'name' => 'Zielony',
                'color' => '#28bf17',
            ),
        ));
    }
}
