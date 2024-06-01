<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    use HasFactory;

    protected $table = 'class_course';

    protected $fillable = [
        'class_id',
        'course_id',
    ];

    public $timestamps = false;
}
