<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Children>
 */
class ChildrenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'male_parents_id' => fake()->randomDigitNotZero(1,100), 
            'female_parents_id' => fake()->randomDigitNotZero(1,100),
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['male','female']), 
            'dob' => fake()->date(), 
            'class' => fake()->randomElement(['A-1','A-2','A-3','A-4','B-1']), 
            'currentlocation' => fake()->word()
        ];
    }
}
