@extends('layouts.app')

@section('title', 'Students')

@section('content')
<div class="page-header">
    <h1>Students Management</h1>
    <p>View and manage all enrolled students</p>
</div>

<div class="card">
    <div class="card-header">
        <h2>All Students</h2>
        <button style="background: #0066ff; color: white; border: none; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-weight: 600;">+ Add Student</button>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Enrollment Date</th>
                <th>Courses Enrolled</th>
                <th>Progress</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td><strong>{{ $student->name }}</strong></td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->enrollment_date->format('M d, Y') }}</td>
                <td>{{ $student->courses_enrolled }}</td>
                <td>
                    <div class="progress-bar" style="width: 100px;">
                        <div class="progress-fill" style="width: {{ $student->progress }}%;"></div>
                    </div>
                    <span style="font-size: 12px;">{{ $student->progress }}%</span>
                </td>
                <td>
                    @if($student->status === 'active')
                        <span class="badge badge-green">Active</span>
                    @elseif($student->status === 'completed')
                        <span class="badge badge-blue">Completed</span>
                    @else
                        <span class="badge badge-orange">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="#" style="color: #0066ff; text-decoration: none; margin-right: 10px;">View</a>
                    <a href="#" style="color: #f44336; text-decoration: none;">Remove</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 30px; color: #999;">No students found yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($students->hasPages())
    <div class="pagination">
        {{ $students->links() }}
    </div>
    @endif
</div>
@endsection
