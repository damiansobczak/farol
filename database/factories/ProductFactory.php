<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Product::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			"name" => $this->faker->word(),
			"imageAlt" => $this->faker->word(),
			"image" => $this->faker->imageUrl(),
			"categoryId" => $this->faker->numberBetween(1, 3),
			"featured" => $this->faker->numberBetween(0, 1),
			"description" => $this->faker->sentence(20),
			"show" => $this->faker->numberBetween(0, 1),
			"avaibility" => $this->faker->numberBetween(0, 1),
			"availableMaterials" => array("1"),
			"seoTitle" => $this->faker->sentence(20),
			"seoDescription" => $this->faker->sentence(20),
			"ogTitle" => $this->faker->sentence(20),
			"ogDesc" => $this->faker->sentence(20)
		];
	}
}
