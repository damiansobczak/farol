<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attributes;

class AttributesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Attributes::factory()
				->times(3)
				->create();
	}
}
