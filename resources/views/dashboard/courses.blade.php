@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<div class="page-header">
    <h1>Courses Management</h1>
    <p>Manage and monitor all your courses</p>
</div>

<div class="card">
    <div class="card-header">
        <h2>Active Courses</h2>
        <button style="background: #0066ff; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: 600;">+ Add Course</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Category</th>
                <th>Level</th>
                <th>Students</th>
                <th>Completion</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
            <tr>
                <td><strong>{{ $course->title }}</strong></td>
                <td>{{ $course->category }}</td>
                <td><span class="badge badge-blue">{{ ucfirst($course->level) }}</span></td>
                <td>{{ $course->students }}</td>
                <td>
                    <div class="progress-bar" style="width: 100px;">
                        <div class="progress-fill" style="width: {{ $course->completion_rate }}%;"></div>
                    </div>
                    <span style="font-size: 12px;">{{ $course->completion_rate }}%</span>
                </td>
                <td>
                    @if($course->is_published)
                        <span class="badge badge-green">Published</span>
                    @else
                        <span class="badge badge-orange">Draft</span>
                    @endif
                </td>
                <td>
                    <a href="#" style="color: #0066ff; text-decoration: none; margin-right: 10px;">Edit</a>
                    <a href="#" style="color: #f44336; text-decoration: none;">Delete</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 30px; color: #999;">No courses found. Create your first course!</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($courses->hasPages())
    <div class="pagination">
        {{ $courses->links() }}
    </div>
    @endif
</div>
@endsection
