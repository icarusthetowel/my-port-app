<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    protected $fillable = [
        'date',
        'total_users',
        'active_users',
        'new_enrollments',
        'course_completions',
        'average_score'
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
