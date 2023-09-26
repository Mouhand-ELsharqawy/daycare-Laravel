<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'childrens_id' => fake()->randomDigitNotZero(1,100),
            'nappinghours' => fake()->randomFloat(),
            'food' => fake()->word(), 
            'extrainfo' => fake()->sentence(4), 
            'behavior' => fake()->sentence(3), 
            'playinglocation' => fake()->sentence(2), 
            'vaccine' => fake()->randomElement(['done','NotYet'])
        ];
    }
}
