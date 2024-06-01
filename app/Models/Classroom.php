<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Classroom extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'class';

    protected $fillable = [
        'name',
        'number_student',
        'school_year_id',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name', 'semester.name', 'start_date', 'end_date'],
                'unique' => true,
            ]
        ];
    }

    public function semester()
    {
        return $this->hasOneThrough(
            Semester::class,
            SchoolYear::class,
            'id',
            'id',
            'school_year_id',
            'semester_id'
        );
        // Giải thích:
        // - related: Semester::class: Model mà bạn muốn lấy dữ liệu từ đó.
        // - through: SchoolYear::class: Model trung gian giữa Classroom và Semester.
        // - firstKey: 'id': Khóa chính của SchoolYear.
        // - secondKey: 'id': Khóa chính của Semester.
        // - localKey: 'school_year_id': Khóa ngoại của Classroom.
        // - secondLocalKey: 'semester_id': Khóa ngoại của SchoolYear.
    }

    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function getStartDateAttribute()
    {
        return Carbon::parse($this->school_year->start_date)->format('Y');
        // Giải thích:
        // - $this->school_year: Lấy ra thông tin của SchoolYear mà Classroom đang tham chiếu tới.
        // - ->start_date: Lấy ra ngày bắt đầu của SchoolYear.
        // - ->format('Y'): Định dạng ngày tháng năm theo định dạng 'Y' (năm).
    }

    public function getEndDateAttribute()
    {
        return Carbon::parse($this->school_year->end_date)->format('Y');
    }

    public $timestamps = false;
}
