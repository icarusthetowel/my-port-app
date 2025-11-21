@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1>Welcome Jhone!</h1>
    <p>Education is the passport to the future. So learn more & more</p>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card blue">
        <div class="stat-label">Total Courses</div>
        <div class="stat-value">{{ $totalCourses }}</div>
        <div class="stat-change up">↑ 2 New</div>
    </div>
    <div class="stat-card orange">
        <div class="stat-label">Total Students</div>
        <div class="stat-value">{{ $totalStudents }}</div>
        <div class="stat-change">From all courses</div>
    </div>
    <div class="stat-card red">
        <div class="stat-label">Active Users</div>
        <div class="stat-value">{{ $activeUsers }}</div>
        <div class="stat-change">Today active</div>
    </div>
    <div class="stat-card green">
        <div class="stat-label">Avg Completion Rate</div>
        <div class="stat-value">{{ $completionRate }}%</div>
        <div class="stat-change up">↑ 15%</div>
    </div>
</div>

<!-- Current Running Courses -->
<div class="card">
    <div class="card-header">
        <h2>Current Running Courses</h2>
        <a href="{{ route('dashboard.courses') }}" class="view-all">View All →</a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px;">
        @foreach($coursesData as $course)
        <div style="background: #f9fafb; padding: 15px; border-radius: 8px;">
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); height: 80px; border-radius: 6px; margin-bottom: 10px;"></div>
            <h3 style="font-size: 14px; font-weight: 600; margin-bottom: 5px;">{{ $course->title }}</h3>
            <p style="font-size: 12px; color: #999; margin-bottom: 10px;">{{ $course->students }} students</p>
            <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 5px;">
                <span>Progress</span>
                <span>{{ $course->completion_rate }}%</span>
            </div>
            <div class="progress-bar">
                <div class="progress-fill" style="width: {{ $course->completion_rate }}%;"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Two Column Layout -->
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
    <!-- Upcoming Lessons -->
    <div class="card">
        <div class="card-header">
            <h2>Upcoming Lessons</h2>
            <a href="#" class="view-all">View All</a>
        </div>
        
        <div style="margin-bottom: 20px;">
            <h3 style="font-size: 14px; font-weight: 600; margin-bottom: 10px;">Programming</h3>
            <p style="font-size: 12px; color: #999; margin-bottom: 10px;">Every Day 12:00 to 1:10m</p>
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <div style="width: 40px; height: 40px; background: #e0e7ff; border-radius: 50%;"></div>
                <div style="width: 40px; height: 40px; background: #fce4ec; border-radius: 50%;"></div>
                <div style="width: 40px; height: 40px; background: #f1f8e9; border-radius: 50%;"></div>
            </div>
        </div>

        <div>
            <h3 style="font-size: 14px; font-weight: 600; margin-bottom: 10px;">Core Language</h3>
            <p style="font-size: 12px; color: #999; margin-bottom: 10px;">Every Day 12:pm to 01:pm</p>
            <div style="display: flex; gap: 10px; margin-top: 10px;">
                <div style="width: 40px; height: 40px; background: #ffebee; border-radius: 50%;"></div>
                <div style="width: 40px; height: 40px; background: #e8f5e9; border-radius: 50%;"></div>
                <div style="width: 40px; height: 40px; background: #fff3e0; border-radius: 50%;"></div>
            </div>
        </div>
    </div>

    <!-- Recent Notifications -->
    <div class="card">
        <div class="card-header">
            <h2>Recent Notifications</h2>
        </div>
        @foreach($recentNotifications as $notif)
        <div style="border-bottom: 1px solid #e5e7eb; padding-bottom: 12px; margin-bottom: 12px;">
            <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 5px;">
                <span style="font-weight: 600;">{{ $notif['time'] }}</span>
                <span style="color: #999;">by {{ $notif['author'] }}</span>
            </div>
            <p style="font-size: 13px; color: #666;">{{ $notif['message'] }}</p>
        </div>
        @endforeach
        <a href="#" class="view-all" style="text-align: center; display: block; padding-top: 10px;">View all →</a>
    </div>
</div>

<!-- Working Hours & Analytics -->
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 20px;">
    <div class="card">
        <div class="card-header">
            <h2>Working Hours</h2>
            <span style="color: #ff9800; font-size: 12px; font-weight: 600;">Today ↑</span>
        </div>
        <div style="text-align: center; padding: 20px;">
            <div style="font-size: 48px; font-weight: 700; color: #0066ff;">77%</div>
            <p style="color: #999; font-size: 12px; margin-top: 10px;">
                <span style="display: inline-block; width: 8px; height: 8px; background: #ff9800; border-radius: 50%; margin-right: 5px;"></span>Progress
                <span style="display: inline-block; width: 8px; height: 8px; background: #0066ff; border-radius: 50%; margin: 0 5px;"></span>Done
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Total Courses</h2>
        </div>
        <div style="text-align: center; padding: 20px;">
            <div style="font-size: 48px; font-weight: 700; color: #999;">19</div>
            <div style="display: flex; justify-content: center; gap: 20px; margin-top: 15px; font-size: 12px;">
                <div>
                    <span style="display: inline-block; width: 8px; height: 8px; background: #4caf50; border-radius: 50%; margin-right: 5px;"></span>
                    <strong>First</strong>
                </div>
                <div>
                    <span style="display: inline-block; width: 8px; height: 8px; background: #00bcd4; border-radius: 50%; margin-right: 5px;"></span>
                    <strong>COMP</strong>
                </div>
                <div>
                    <span style="display: inline-block; width: 8px; height: 8px; background: #ff9800; border-radius: 50%; margin-right: 5px;"></span>
                    <strong>To Do</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Hours spent</h2>
        </div>
        <div style="text-align: center; padding: 20px;">
            <div style="font-size: 48px; font-weight: 700; color: #999;">21h 30 min</div>
            <p style="color: #f44336; font-size: 12px; margin-top: 10px;">↓ 15%</p>
        </div>
    </div>
</div>
@endsection
