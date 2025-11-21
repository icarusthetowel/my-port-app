<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'enrollment_date',
        'courses_enrolled',
        'courses_completed',
        'progress',
        'status',
        'avatar_url'
    ];

    protected $casts = [
        'enrollment_date' => 'date',
    ];
}
