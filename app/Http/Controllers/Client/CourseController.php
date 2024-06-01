<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TestUser;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Test;
use App\Models\Collection;

class CourseController extends Controller
{
    public function index()
    {
        return view('client.course.index');
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $tests = Test::where('course_id', $course->id)->get();

        $testUser = TestUser::where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->first();

        return view('client.test.index', compact('course', 'tests', 'testUser'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $course = Course::where('slug', $data['course_slug'])->first();

        $insertCourseUser = CourseUser::create([
            'course_id' => $course->id,
            'user_id' => Auth::id(),
            'progress' => 1,
        ]);

        if ($insertCourseUser) {
            return redirect()->back()->with('success', 'Course registered successfully');
        }

        return redirect()->back()->with('error', 'Failed to register course');
    }
}
