<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::insert(array(
            array(
                'name' => 'Tkanina podgumowana',
                'property' => Str::slug('Tkanina podgumowana')
            ),
            array(
                'name' => 'Tkanina zaciemniająca',
                'property' => Str::slug('TTkanina zaciemniająca')
            ),
        ));
    }
}
