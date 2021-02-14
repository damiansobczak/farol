<?php

namespace Database\Factories;

use App\Models\Attributes;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributesFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Attributes::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			"name" => $this->faker->word(),
			"image" => $this->faker->imageUrl(),
			"imageAlt" => $this->faker->word(),
			"attributeType" => $this->faker->numberBetween(1,3),
			"attributeGroup" => $this->faker->numberBetween(1,3),
			"cost" => $this->faker->numberBetween(0, 100),
			"costIsPercent" => $this->faker->boolean()
		];
	}
}
