@extends('layouts.app')

@section('title', 'Analytics')

@section('content')
<div class="page-header">
    <h1>Analytics & Reports</h1>
    <p>Track platform performance and user engagement</p>
</div>

<!-- Analytics Stats -->
<div class="stats-grid">
    <div class="stat-card blue">
        <div class="stat-label">Total Users</div>
        <div class="stat-value">{{ $analytics->count() > 0 ? $analytics[0]->total_users : 0 }}</div>
        <div class="stat-change up">↑ 12%</div>
    </div>
    <div class="stat-card orange">
        <div class="stat-label">Active Users</div>
        <div class="stat-value">{{ $analytics->count() > 0 ? $analytics[0]->active_users : 0 }}</div>
        <div class="stat-change">Today</div>
    </div>
    <div class="stat-card red">
        <div class="stat-label">New Enrollments</div>
        <div class="stat-value">{{ $analytics->sum('new_enrollments') }}</div>
        <div class="stat-change down">↓ 5%</div>
    </div>
    <div class="stat-card green">
        <div class="stat-label">Avg Score</div>
        <div class="stat-value">{{ round($analytics->avg('average_score'), 1) }}%</div>
        <div class="stat-change up">↑ 8%</div>
    </div>
</div>

<!-- Charts Section -->
<div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
    <!-- User Growth Chart -->
    <div class="card">
        <div class="card-header">
            <h2>User Growth Trend</h2>
        </div>
        <div style="height: 250px; background: linear-gradient(to bottom, #e3f2fd, transparent); border-radius: 8px; display: flex; align-items: flex-end; justify-content: space-around; padding: 20px; gap: 10px;">
            @for($i = 0; $i < 12; $i++)
            <div style="width: 100%; height: {{ rand(40, 100) }}%; background: linear-gradient(to top, #0066ff, #00d4ff); border-radius: 4px;"></div>
            @endfor
        </div>
        <div style="margin-top: 15px; display: flex; justify-content: center; gap: 20px; font-size: 12px;">
            <div>
                <span style="display: inline-block; width: 8px; height: 8px; background: #0066ff; border-radius: 50%; margin-right: 5px;"></span>
                Total Users
            </div>
        </div>
    </div>

    <!-- Completion Rate Chart -->
    <div class="card">
        <div class="card-header">
            <h2>Course Completions</h2>
        </div>
        <div style="height: 250px; background: linear-gradient(to bottom, #fff3e0, transparent); border-radius: 8px; display: flex; align-items: flex-end; justify-content: space-around; padding: 20px; gap: 10px;">
            @for($i = 0; $i < 12; $i++)
            <div style="width: 100%; height: {{ rand(20, 80) }}%; background: linear-gradient(to top, #ff9800, #ffb74d); border-radius: 4px;"></div>
            @endfor
        </div>
        <div style="margin-top: 15px; display: flex; justify-content: center; gap: 20px; font-size: 12px;">
            <div>
                <span style="display: inline-block; width: 8px; height: 8px; background: #ff9800; border-radius: 50%; margin-right: 5px;"></span>
                Completions
            </div>
        </div>
    </div>
</div>

<!-- Detailed Analytics Table -->
<div class="card" style="margin-top: 20px;">
    <div class="card-header">
        <h2>Daily Analytics Report</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Users</th>
                <th>Active Users</th>
                <th>New Enrollments</th>
                <th>Completions</th>
                <th>Avg Score</th>
            </tr>
        </thead>
        <tbody>
            @forelse($analytics as $record)
            <tr>
                <td><strong>{{ $record->date->format('M d, Y') }}</strong></td>
                <td>{{ $record->total_users }}</td>
                <td>{{ $record->active_users }}</td>
                <td><span class="badge badge-blue">{{ $record->new_enrollments }}</span></td>
                <td><span class="badge badge-green">{{ $record->course_completions }}</span></td>
                <td>
                    <div class="progress-bar" style="width: 100px;">
                        <div class="progress-fill" style="width: {{ $record->average_score }}%;"></div>
                    </div>
                    {{ round($record->average_score, 1) }}%
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 30px; color: #999;">No analytics data available yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
