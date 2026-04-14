<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create or update the admin user from env variables (safe for GitHub)
        $admin = \App\Models\User::updateOrCreate(
            ['email' => env('SEED_ADMIN_EMAIL', 'admin@example.com')],
            [
                'name' => env('SEED_ADMIN_NAME', 'Administrator'),
                'workos_id' => env('SEED_ADMIN_WORKOS_ID', 'fake-admin-id'),
                'avatar' => 'https://ui-avatars.com/api/?name='.urlencode(env('SEED_ADMIN_NAME', 'Admin')),
            ]
        );

        // Create 10 more random users
        \App\Models\User::factory(10)->create();

        // Create 5 courses
        $courses = Course::factory(5)->create([
            'lecturer' => env('SEED_ADMIN_NAME', 'Administrator'),
        ]);

        // Create 20 students
        $students = Student::factory(20)->create();

        // For each course, add some classwork and enroll some students
        foreach ($courses as $course) {
            // Link you as the owner (Creator)
            \Illuminate\Support\Facades\DB::table('course_user')->insert([
                'course_id' => $course->id,
                'user_id' => $admin->id,
                'role' => 'creator',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add 3 classworks per course
            \App\Models\Classwork::factory(3)->create([
                'course_id' => $course->id,
            ]);

            // Enroll 8-12 random students in this course
            $enrolledStudents = $students->random(rand(8, 12));
            foreach ($enrolledStudents as $student) {
                Enrollment::factory()->create([
                    'course_id' => $course->id,
                    'student_id' => $student->id,
                ]);
            }

            // Create some stream posts
            \App\Models\StreamPost::create([
                'course_id' => $course->id,
                'user_id' => $admin->id,
                'content' => 'Welcome to '.$course->course_name.'! I hope you all have a great semester.',
            ]);
        }

    }
}
