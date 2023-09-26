<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolTrip>
 */
class SchoolTripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chaperone' => fake()->name(), 
            'schoollocation' => fake()->sentence(3), 
            'cost' => fake()->randomFloat(), 
            'comments' => fake()->sentence(5) 
        ];
    }
}
