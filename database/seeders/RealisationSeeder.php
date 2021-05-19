<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Realisation;

class RealisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Realisation::factory()
            ->times(3)
            ->create();
    }
}
