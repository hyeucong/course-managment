<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Enrollment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attendance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'enrollment_id' => Enrollment::factory(), // We'll handle this in the seeder for proper relations.
            'attendance_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['present', 'absent', 'late', 'excused']),
        ];
    }
}
