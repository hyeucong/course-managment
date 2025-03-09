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

        // Enroll students in courses and create attendance records
        foreach ($courses as $course) {
            // Randomly select 3 to 6 students to enroll in the current course
            $studentsToEnroll = $students->random(rand(3, 6));

            foreach ($studentsToEnroll as $student) {
                // Enroll the student in the course
                $enrollment = Enrollment::factory()->create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                ]);

                // Create attendance records for the enrollment
                // Example: Create attendance records for the past 5 days
                for ($i = 0; $i < 5; $i++) {
                    Attendance::factory()->create([
                        'enrollment_id' => $enrollment->id,
                        'attendance_date' => now()->subDays($i), // Dates in the past
                    ]);
                }
            }
        }

    }
}
