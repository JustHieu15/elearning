<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Semester;
use App\Models\SchoolYear;
use App\Models\Classroom;
use App\Models\Course;

class ClassController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        $schools = SchoolYear::all();
        $classes = Classroom::all();

        foreach ($schools as $school) {
            $startYear = date('Y', strtotime($school->start_date));
            $endYear = date('Y', strtotime($school->end_date));

            $school->start = $startYear;
            $school->end = $endYear;
        }

        return view('admin.class.index', compact('semesters', 'schools', 'classes'));
    }

    public function search(Request $request)
    {
        $data = $request->all();

        $semesters = Semester::all();
        $schools = SchoolYear::all();

        foreach ($schools as $school) {
            $startYear = date('Y', strtotime($school->start_date));
            $endYear = date('Y', strtotime($school->end_date));

            $school->start = $startYear;
            $school->end = $endYear;
        }

        $classes = Classroom::join('school_year', 'class.school_year_id', '=', 'school_year.id')
            ->join('semester', 'school_year.semester_id', '=', 'semester.id')
            ->where('semester.id', '=', $data['semester_id'])
            ->where('school_year.start_date', '>=', $data['start_date'])
            ->where('school_year.end_date', '<=', $data['end_date'])
            ->select('class.*', 'school_year.start_date', 'school_year.end_date', 'semester.name as semester_name')
            ->get();

        return view('admin.class.search', compact('semesters', 'schools', 'classes'));
    }

    public function create()
    {
        $schoolYear = SchoolYear::join('semester', 'school_year.semester_id', '=', 'semester.id')
            ->select('school_year.*', 'semester.name as semester_name')
            ->get();

        $class = Classroom::orderBy('id', 'desc')->first();

        if (empty($class)) {
            $class = new Classroom();
            $class->id = 1;
        } else {
            $class->id += 1;
        }

        foreach ($schoolYear as $value) {
            $startYear = date('Y', strtotime($value->start_date));
            $endYear = date('Y', strtotime($value->end_date));

            $value->name = $value->semester_name . ' (' . $startYear . ' - ' . $endYear . ')';
        }

        return view('admin.class.create', compact('schoolYear', 'class'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $insertClass = Classroom::create([
            'name' => $data['name'],
            'number_student' => $data['number_of_students'],
            'school_year_id' => $data['school_year_id'],
        ]);

        if ($insertClass) {
            $insertClass->save();

            return redirect()->route('admin.class.index')->with('success', 'Class created successfully');
        }

        return redirect()->route('admin.class.index')->with('error', 'Class created failed');
    }

    public function manage($slug)
    {
        $class = Classroom::join('school_year', 'class.school_year_id', '=', 'school_year.id')
            ->join('semester', 'school_year.semester_id', '=', 'semester.id')
            ->select('class.*', 'school_year.start_date', 'school_year.end_date', 'semester.name as semester_name')
            ->where('class.slug', $slug)
            ->first();

        $courses = Course::join('class_course', 'course.id', '=', 'class_course.course_id')
            ->join('subject', 'course.subject_id', '=', 'subject.id')
            ->select('course.*', 'subject.name as subject_name')
            ->where('class_course.class_id', $class->id)
            ->get();

        return view('admin.class.manage', compact('class', 'courses'));
    }

//    public function update(Request $request)
//    {
//        $id = session()->has('class_id') ? session('class_id') : null;
//
//        if (!$id) {
//            return redirect()->route('admin.class')->with('error', 'Class not found');
//        }
//
//        $data = $request->all();
//
//        return redirect()->route('admin.class')->with('success', 'Class updated successfully');
//    }
//
//    public function destroy(Request $request)
//    {
//        $id = $request->id;
//
//        if (!$id) {
//            return redirect()->route('admin.class')->with('error', 'Class not found');
//        }
//
//        return redirect()->route('admin.class')->with('success', 'Class deleted successfully');
//    }
}
