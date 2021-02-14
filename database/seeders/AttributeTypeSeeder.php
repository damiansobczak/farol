<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttributeType;

class AttributeTypeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		AttributeType::factory()
					->times(3)
					->create();
	}
}
