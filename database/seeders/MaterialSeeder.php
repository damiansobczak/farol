<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::insert(array(
            array(
                'name' => 'Błękitna laguna',
                'code' => 'A602',
                'transmission' => '0%',
                'absorption' => '0%',
                'reflection' => '0%',
                'color_id' => '1',
                'collection_id' => '1',
            )
        ));
    }
}
