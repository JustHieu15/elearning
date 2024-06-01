<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\CourseUser;
use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('client.subject.index', compact('subjects'));
    }

    public function show($slug)
    {
        $subject = Subject::where('slug', $slug)->first();

        $course = Course::where('subject_id', $subject->id)->get();

        if (!$course) {
            return redirect()->route('subject.index');
        }

        foreach ($course as $key => $value) {
            $course[$key]->courseUser = CourseUser::where('course_id', $value->id)->where('user_id', Auth::id())->get();
        }

        return view('client.subject.show', compact('subject', 'course'));
    }
}
