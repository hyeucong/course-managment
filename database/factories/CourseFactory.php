<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->sentence(3);
        return [
            'course_name' => $name,
            'course_code' => strtoupper(Str::random(3)) . fake()->numberBetween(100, 999),
            'slug' => Str::slug($name),
            'lecturer' => fake()->name(),
            'room' => 'Room ' . fake()->numberBetween(1, 100),
            'status' => 'active',
            'schedule' => fake()->dayOfWeek(),
            'background_url' => 'https://api.dicebear.com/7.x/initials/svg?seed=' . Str::random(10),
            'description' => fake()->paragraph(),
            'date_start' => now(),
            'date_end' => now()->addMonths(4),
        ];
    }
}
