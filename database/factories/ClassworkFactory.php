<?php

namespace Database\Factories;

use App\Models\Classwork;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classwork>
 */
class ClassworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'due_date' => now()->addDays(fake()->numberBetween(1, 14)),
            'points' => fake()->randomElement([10, 20, 50, 100]),
        ];
    }
}
