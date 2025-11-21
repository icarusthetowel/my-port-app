<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Analytics;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user for login
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Seed courses
        $courseData = [
            [
                'title' => 'It & software',
                'slug' => 'it-software',
                'description' => 'Learn the fundamentals of IT and software development',
                'category' => 'Technology',
                'level' => 'beginner',
                'instructor' => 'Paical Dan',
                'duration' => 120,
                'lessons' => 24,
                'students' => 125,
                'completion_rate' => 55,
                'is_published' => true,
            ],
            [
                'title' => 'Programming',
                'slug' => 'programming',
                'description' => 'Master programming concepts and languages',
                'category' => 'Technology',
                'level' => 'intermediate',
                'instructor' => 'Paical Dan',
                'duration' => 180,
                'lessons' => 36,
                'students' => 89,
                'completion_rate' => 65,
                'is_published' => true,
            ],
            [
                'title' => 'Networking',
                'slug' => 'networking',
                'description' => 'Comprehensive networking course',
                'category' => 'Technology',
                'level' => 'intermediate',
                'instructor' => 'Paical Dan',
                'duration' => 150,
                'lessons' => 30,
                'students' => 76,
                'completion_rate' => 75,
                'is_published' => true,
            ],
            [
                'title' => 'Network Security',
                'slug' => 'network-security',
                'description' => 'Learn network security best practices',
                'category' => 'Security',
                'level' => 'advanced',
                'instructor' => 'Paical Dan',
                'duration' => 200,
                'lessons' => 40,
                'students' => 54,
                'completion_rate' => 45,
                'is_published' => true,
            ],
        ];

        foreach ($courseData as $course) {
            Course::create($course);
        }

        // Seed students
        $studentData = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '+1234567890', 'enrollment_date' => now()->subDays(30), 'courses_enrolled' => 2, 'courses_completed' => 0, 'progress' => 45, 'status' => 'active'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '+1234567891', 'enrollment_date' => now()->subDays(60), 'courses_enrolled' => 3, 'courses_completed' => 1, 'progress' => 78, 'status' => 'active'],
            ['name' => 'Mike Johnson', 'email' => 'mike@example.com', 'phone' => '+1234567892', 'enrollment_date' => now()->subDays(90), 'courses_enrolled' => 4, 'courses_completed' => 2, 'progress' => 92, 'status' => 'completed'],
            ['name' => 'Sarah Williams', 'email' => 'sarah@example.com', 'phone' => '+1234567893', 'enrollment_date' => now()->subDays(45), 'courses_enrolled' => 1, 'courses_completed' => 0, 'progress' => 30, 'status' => 'active'],
            ['name' => 'Robert Brown', 'email' => 'robert@example.com', 'phone' => '+1234567894', 'enrollment_date' => now()->subDays(15), 'courses_enrolled' => 2, 'courses_completed' => 0, 'progress' => 20, 'status' => 'inactive'],
        ];

        foreach ($studentData as $student) {
            Student::create($student);
        }

        // Seed analytics
        for ($i = 0; $i < 30; $i++) {
            Analytics::create([
                'date' => now()->subDays($i),
                'total_users' => rand(150, 300),
                'active_users' => rand(50, 150),
                'new_enrollments' => rand(5, 20),
                'course_completions' => rand(2, 10),
                'average_score' => rand(60, 95),
            ]);
        }
    }
}
