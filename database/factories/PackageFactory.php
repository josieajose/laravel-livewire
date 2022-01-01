<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'commitment_period' => $this->faker->unique()->numberBetween(1, 12),
            'sell_limit' => $this->faker->unique()->numberBetween(10, 50),
            'credits' => $this->faker->unique()->numberBetween(10, 50)
        ];
    }
}
