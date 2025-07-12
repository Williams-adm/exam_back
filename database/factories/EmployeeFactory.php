<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'surnames' => fake()->words(2, true),
            'phone' => fake()->unique()->randomNumber(9, true),
            'email' => fake()->unique()->email(),
            'salary' => fake()->randomFloat(2, 100, 1000),
            'type_document' => fake()->randomElement(['dni', 'ruc']),
            'document_number' => fake()->unique()->randomNumber(9, true),
            'address' => fake()->streetAddress(),
        ];
    }
}
