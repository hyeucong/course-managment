<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Attendance;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create students
        $students = Student::factory(10)->create();

        // Create courses
        $courses = Course::factory(5)->create();

    }
}
