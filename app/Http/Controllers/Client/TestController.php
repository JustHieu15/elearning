<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Collection;
use App\Models\TestUser;
use App\Models\Test;
use App\Models\Question;
use App\Models\Answer;

class TestController extends Controller
{
    public function index()
    {
        return view('client.test.index');
    }

    public function show(Request $request, $slug)
    {
        $request->session()->put('test_slug', $slug);

        $tests = Test::join('collection_test', 'test.id', '=', 'collection_test.test_id')
            ->join('collection', 'collection_test.collection_id', '=', 'collection.id')
            ->where('test.slug', $slug)
            ->select('test.*', 'collection.name as collection_name', 'collection.slug as collection_slug')
            ->first();

        if (empty($tests)) {
            return redirect()->route('subject.index');
        }

        $questions = Question::join('collection_question', 'question.id', '=', 'collection_question.question_id')
            ->join('collection', 'collection_question.collection_id', '=', 'collection.id')
            ->select('question.*')
            ->where('collection.slug', $tests->collection_slug)
            ->get();

        $answers = Answer::join('question', 'answer.question_id', '=', 'question.id')
            ->join('collection_question', 'question.id', '=', 'collection_question.question_id')
            ->join('collection', 'collection_question.collection_id', '=', 'collection.id')
            ->select('answer.*')
            ->where('collection.slug', $tests->collection_slug)
            ->get();

        $tests->questions = $questions;
        $time = explode(':', $tests->time_limit);
        $tests->time_limit = $time[0] * 60 + $time[1];

        foreach ($questions as $question) {
            $question->answers = $answers->where('question_id', $question->id);
        }

        return view('client.test.show', compact('tests'));
    }

    public function submit(Request $request)
    {
        $data = $request->all();
        $slug = $request->session()->get('test_slug');

        $test = Test::where('slug', $slug)->first();

        $collection = Collection::join('collection_test', 'collection.id', '=', 'collection_test.collection_id')
            ->join('test', 'collection_test.test_id', '=', 'test.id')
            ->join('collection_question', 'collection.id', '=', 'collection_question.collection_id')
            ->where('test.slug', $slug)
            ->get();

        $correct = 0;

        foreach ($data as $key => $value) {
            $answers = Answer::join('question', 'answer.question_id', '=', 'question.id')
                ->join('collection_question', 'question.id', '=', 'collection_question.question_id')
                ->join('collection', 'collection_question.collection_id', '=', 'collection.id')
                ->select('answer.*')
                ->where('collection.id', $collection[0]->id)
                ->get();

            foreach ($answers as $answer) {
                if ($answer->content == $value && $answer->is_correct == 1) {
                    $correct++;
                }
            }
        }

        $question = Question::join('collection_question', 'question.id', '=', 'collection_question.question_id')
            ->join('collection', 'collection_question.collection_id', '=', 'collection.id')
            ->where('collection.id', $collection[0]->id)
            ->get();

        $result = ($correct / count($question)) * 10;

        $testUser = TestUser::create([
            'test_id' => $test->id,
            'user_id' => Auth::id(),
            'result' => $result
        ]);

        if ($testUser) {
            return redirect()->route('test.result', $test->slug);
        }

        return redirect()->back();
    }

    public function result($slug)
    {
        $test = Test::where('slug', $slug)->first();

        $testUser = TestUser::where('test_id', $test->id)->where('user_id', Auth::id())->orderBy('id', 'desc')->first();

        $testSlug = $test->slug;

        return view('client.test.result', compact('testUser', 'testSlug'));
    }
}
