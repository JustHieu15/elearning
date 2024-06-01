<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Course extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'course';

    protected $fillable = [
        'name',
        'subject_id',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name', 'subject.slug'],
                'unique' => true,
                'onUpdate' => true
            ]
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($course) {
            $course_name = $course->getOriginal('name');
            $subject_slug = $course->subject->slug;

            $course->slug = \Str::slug($course_name . ' ' . $subject_slug);
        });
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public $timestamps = false;
}
