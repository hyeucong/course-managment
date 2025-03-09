<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Course::create([
            'course_name' => 'Introduction to Computer Science',
            'course_code' => 'CS101',
            'lecturer' => 'Dr. Smith',
            'date_start' => '2024-09-02',
            'date_end' => '2024-12-16',
            'schedule' => 'MWF 10:00-10:50',
            'description' => 'A foundational course in computer science principles.',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
