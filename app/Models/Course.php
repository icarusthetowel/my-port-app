<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'duration',
        'lessons',
        'students',
        'completion_rate',
        'level',
        'category',
        'instructor',
        'image_url',
        'is_published'
    ];
}
