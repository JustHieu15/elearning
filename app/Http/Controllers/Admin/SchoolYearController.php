<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Classroom;
use App\Models\SchoolYear;
use App\Models\Semester;

class SchoolYearController extends Controller
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

        return view('admin.semester.index', compact('semesters', 'schools', 'classes'));
    }

    public function create()
    {
        $semesters = Semester::all();
        $schoolYear = SchoolYear::orderBy('id', 'desc')->first();

        if (empty($schoolYear)) {
            $schoolYear = new SchoolYear();
            $schoolYear->id = 1;
        } else {
            $schoolYear->id += 1;
        }

        return view('admin.semester.create', compact('semesters', 'schoolYear'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $start_date = date('Y-m-d', strtotime($data['start_date']));
        $end_date = date('Y-m-d', strtotime($data['end_date']));

        $insertSchoolYear = SchoolYear::create([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'semester_id' => $data['semester_id']
        ]);

        if ($insertSchoolYear) {
            return redirect()->route('admin.semester.index')->with('message', 'Success');
        }

        return redirect()->route('admin.semester.index')->with('message', 'Failed');
    }

    public function edit(Request $request, $id)
    {
        $request->session()->put('school_year_id', $id);

        $schoolYear = SchoolYear::where('id', '=', $id)->first();
        $semester = Semester::where('id', '=', $schoolYear->semester_id)->first();

        return view('admin.semester.edit', compact('semester', 'schoolYear'));
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $schooYearId = $request->session()->get('school_year_id');

        $start_date = date('Y-m-d', strtotime($data['start_date']));
        $end_date = date('Y-m-d', strtotime($data['end_date']));

        $updateSchoolYear = SchoolYear::where('id', '=', $schooYearId)->first();

        if ($updateSchoolYear) {
            $updateSchoolYear->update([
                'start_date' => $start_date,
                'end_date' => $end_date,
            ]);

            return redirect()->route('admin.semester.index')->with('message', 'Success');
        }

        return redirect()->route('admin.semester.index')->with('message', 'Failed');
    }

}
