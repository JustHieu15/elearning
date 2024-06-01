<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\SchoolYear;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Test;

class DashboardController extends Controller
{
    public function index()
    {
        $schools = SchoolYear::all();

        foreach ($schools as $school) {
            $startYear = date('Y', strtotime($school->start_date));
            $endYear = date('Y', strtotime($school->end_date));

            $school->start = $startYear;
            $school->end = $endYear;
        }

        $classes= Classroom::join('school_year', 'class.school_year_id', '=', 'school_year.id')
            ->orderBy('class.id', 'desc')
            ->limit(5)
            ->get();

        $countCourses = Course::count();
        $countTests = Test::count();
        $countStudents = User::where('role_id', '3')->count();

        return view('admin.index', compact('schools', 'classes', 'countCourses', 'countTests', 'countStudents'));
    }
}
