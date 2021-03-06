<?php

namespace Database\Seeders;

use App\Models\Collection;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::insert(array(
            array(
                'name' => 'Carina',
            ),
            array(
                'name' => 'Melania',
            ),
            array(
                'name' => 'Blue Laguna',
            ),
        ));
    }
}
