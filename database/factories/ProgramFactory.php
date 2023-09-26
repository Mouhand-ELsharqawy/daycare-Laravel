<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
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
            'programname' => fake()->domainName(), 
            'programdate' => fake()->date(), 
            'departmentphone' => fake()->phoneNumber(), 
            'location' => fake()->word()
        ];
    }
}
