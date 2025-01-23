<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->sentence(),
            'calories' => $this->faker->numberBetween(100, 500),
            'proteins' => $this->faker->numberBetween(0, 100),
            'carbs' => $this->faker->numberBetween(0, 100),
            'fats' => $this->faker->numberBetween(0, 100),
            'type' => $this->faker->sentence(),

        ];
    }
}
