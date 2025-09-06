<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'category' => $this->faker->randomElement(['IT', 'Finance', 'Healthcare', 'Education', 'Marketing']),
            'salary_min' => $this->faker->numberBetween(30000, 70000),
            'salary_max' => $this->faker->numberBetween(70001, 150000),
            'description' => $this->faker->paragraph(),
            'profile_id' => \App\Models\Profile::factory(),
        ];
    }
}
