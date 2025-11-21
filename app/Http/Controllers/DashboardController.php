<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Analytics;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalCourses = Course::count();
        $totalStudents = Student::count();
        $activeUsers = Student::where('status', 'active')->count();
        $completionRate = Analytics::latest()->first()?->average_score ?? 0;
        
        $coursesData = Course::select('title', 'completion_rate', 'students')
            ->limit(4)
            ->get();
        
        $recentNotifications = [
            ['time' => '10:10', 'message' => 'Morah quis es eu arcu.', 'author' => 'Jodine'],
            ['time' => '08:40', 'message' => 'From lacl eros no cdk.', 'author' => 'Amila'],
            ['time' => '07:10', 'message' => 'Ln mollis m aluares.', 'author' => 'Jossif'],
            ['time' => '23:12', 'message' => 'Morbi quis es eu arcu.', 'author' => 'Alaya'],
        ];

        return view('dashboard.index', [
            'totalCourses' => $totalCourses,
            'totalStudents' => $totalStudents,
            'activeUsers' => $activeUsers,
            'completionRate' => round($completionRate, 1),
            'coursesData' => $coursesData,
            'recentNotifications' => $recentNotifications
        ]);
    }

    public function courses(): View
    {
        $courses = Course::paginate(10);
        return view('dashboard.courses', compact('courses'));
    }

    public function students(): View
    {
        $students = Student::paginate(10);
        return view('dashboard.students', compact('students'));
    }

    public function analytics(): View
    {
        $analytics = Analytics::orderBy('date', 'desc')->limit(30)->get();
        return view('dashboard.analytics', compact('analytics'));
    }

    public function settings(): View
    {
        return view('dashboard.settings');
    }
}
