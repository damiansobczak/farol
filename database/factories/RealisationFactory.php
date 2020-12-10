<?php

namespace Database\Factories;

use App\Models\Realisation;
use Illuminate\Database\Eloquent\Factories\Factory;

class RealisationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Realisation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(20),
            'image' => $this->faker->imageUrl(),
            'imageAlt' => $this->faker->sentence(3),
        ];
    }
}
