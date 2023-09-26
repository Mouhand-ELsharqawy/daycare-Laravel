<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CurriculumOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employees_id' => fake()->randomDigitNotZero(1,100), 
            'season' => fake()->word(), 
            'agegroup' => fake()->word(), 
            'numberofdays' => fake()->randomFloat(), 
            'hoursperweek' =>fake()->randomFloat(), 
            'description' => fake()->sentence(2)
        ];
    }
}
