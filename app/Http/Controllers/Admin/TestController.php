<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CollectionTest;
use App\Models\TestUser;
use Illuminate\Http\Request;

use App\Models\SchoolYear;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Test;
use App\Models\Collection;

class TestController extends Controller
{
    public function index()
    {
        $semesters = Semester::all();
        $schools = SchoolYear::all();
        $tests = Test::join('course', 'test.course_id', '=', 'course.id')
            ->select('test.*', 'course.name as course_name')
            ->get();

        foreach ($tests as $test) {
            // convert type time_limit from string to integer
            $test->time_limit = strtotime($test->time_limit) - strtotime('00:00:00');

            // convert time_limit from seconds to minutes
            $test->time_limit = $test->time_limit / 60;
        }

        foreach ($schools as $school) {
            $startYear = date('Y', strtotime($school->start_date));
            $endYear = date('Y', strtotime($school->end_date));

            $school->start = $startYear;
            $school->end = $endYear;
        }

        return view('admin.test.index', compact('semesters', 'schools', 'tests'));
    }

    public function create()
    {
        $courses = Course::all();
        $test = Test::select('id')->orderBy('id', 'desc')->first();

        if ($test) {
            $testId = $test->id + 1;
        } else {
            $testId = 1;
        }

        return view('admin.test.create', compact('courses', 'testId'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $timeLimit = $data['time_limit'];
        $timeLimit = gmdate('i:s:00', $timeLimit);

        $insertTest = Test::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'time_limit' => $timeLimit,
            'course_id' => $data['course_id']
        ]);

        if ($insertTest) {
            $insertTest->save();

            return redirect()->route('admin.test.index')->with('success', 'Test created successfully');
        } else {
            return redirect()->route('admin.test.index')->with('error', 'Test failed to create');
        }
    }

    public function show($slug)
    {
        $test = Test::join('course', 'test.course_id', '=', 'course.id')
            ->select('test.*', 'course.name as course_name')
            ->where('test.slug', $slug)
            ->first();

        $test->time_limit = strtotime($test->time_limit) - strtotime('00:00:00');
        $test->time_limit = $test->time_limit / 60;

        $testUsers = TestUser::join('users', 'test_user.user_id', '=', 'users.id')
            ->select('test_user.*', 'users.name as user_name')
            ->where('test_user.test_id', $test->id)
            ->get();

        return view('admin.test.show', compact('test', 'testUsers'));
    }

    public function addCollection(Request $request, $slug)
    {
        $request->session()->put('test_slug', $slug);

        $test = Test::join('course', 'test.course_id', '=', 'course.id')
            ->join('subject', 'course.subject_id', '=', 'subject.id')
            ->select('test.*', 'course.name as course_name', 'subject.name as subject_name', 'subject.id as subject_id')
            ->where('test.slug', $slug)
            ->first();

        $subjectId = $test->subject_id;

        $collections = Collection::where('subject_id', $subjectId)->get();

        $collectionTests = CollectionTest::where('test_id', $test->id)->get()->toArray();

        foreach ($collections as $collection) {
            foreach ($collectionTests as $collectionTest) {
                if ($collection->id == $collectionTest['collection_id']) {
                    $collection->checked = true;
                }
            }
        }


        return view('admin.test.add-collection', compact('test', 'collections'));
    }

    public function storeCollection(Request $request)
    {
        $data = $request->all();
        $testSlug = $request->session()->get('test_slug');

        $test = Test::where('slug', $testSlug)->first();

        $insertCollectionTest = CollectionTest::create([
            'collection_id' => $data['collection_id'],
            'test_id' => $test->id
        ]);

        if ($insertCollectionTest) {
            return redirect()->route('admin.test.index')->with('success', 'Collection added to test successfully');
        }

        return redirect()->route('admin.test.index')->with('error', 'Collection failed to add to test');
    }

    public function edit(Request $request, $slug)
    {
        $request->session()->put('test_slug', $slug);

        $test = Test::where('slug', $slug)->first();
        $courses = Course::all();

        $testId = $test->id;

        $test->time_limit = strtotime($test->time_limit) - strtotime('00:00:00');
        $test->time_limit = $test->time_limit / 60;

        return view('admin.test.edit', compact('test', 'courses', 'testId'));
    }

    public function update(Request $request)
    {
        $slug = $request->session()->get('test_slug');
        $data = $request->all();

        $timeLimit = $data['time_limit'];
        $timeLimit = gmdate('i:s:00', $timeLimit);

        $testUpdate = Test::where('slug', $slug)->first();

        if ($testUpdate) {
            $testUpdate->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'time_limit' => $timeLimit,
                'course_id' => $data['course_id']
            ]);

            $testUpdate->save();

            return redirect()->route('admin.test.index')->with('success', 'Test updated successfully');
        } else {
            return redirect()->route('admin.test.index')->with('error', 'Test failed to update');
        }
    }
}
