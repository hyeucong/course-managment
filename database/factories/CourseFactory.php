<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-1 year', '+1 year');
        $endDate = $this->faker->dateTimeBetween($startDate, strtotime('+6 months', $startDate->getTimestamp()));

        return [
            'course_name' => $this->faker->catchPhrase(),
            'course_code' => $this->faker->unique()->bothify('??-###'), // e.g., CS-101
            'lecturer' => $this->faker->name(),
            'date_start' => $startDate,
            'date_end' => $endDate,
            'schedule' => json_encode([  // Simple schedule example.
                'days' => $this->faker->randomElements(['Mon', 'Tue', 'Wed', 'Thu', 'Fri'], $this->faker->numberBetween(1, 5)),
                'time' => $this->faker->time('H:i'),
            ]),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['active', 'inactive', 'completed']),
        ];
    }
}
