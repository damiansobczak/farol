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
                'image' => 'https://via.placeholder.com/640x480.png/002277?text=nulla',
                'color_id' => '1',
                'collection_id' => '1',
            ),
            array(
                'name' => 'Materiał Drugi',
                'code' => 'A111',
                'image' => 'https://via.placeholder.com/640x480.png/002277?text=nulla',
                'color_id' => '2',
                'collection_id' => '2',
            ),
            array(
                'name' => 'Materiał Trzeci',
                'code' => 'A000',
                'image' => 'https://via.placeholder.com/640x480.png/002277?text=nulla',
                'color_id' => '3',
                'collection_id' => '3'
            ),
        ));
    }
}
