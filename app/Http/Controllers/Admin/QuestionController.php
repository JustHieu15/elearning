<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::join('subject', 'question.subject_id', '=', 'subject.id')
            ->select('question.*', 'subject.name as subject_name')
            ->get();

        return view('admin.question.index', compact('questions'));
    }

    public function create()
    {
        $subjects = Subject::all();

        return view('admin.question.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        foreach ($data as $key => $value) {
            if (strpos($key, 'choice') !== false) {
                $data['choice'][] = $value;
                unset($data[$key]);
            }

            if (strpos($key, 'correct_answer') !== false) {
                $data['correct_answer'][] = $value;
                unset($data[$key]);
            }
        }

        foreach ($data['choice'] as $keys => $choices) {
            foreach ($choices as $key => $choice) {
                $data['answer'][$keys][$key] = [
                    'content' => $choice,
                    'is_correct' => $data['correct_answer'][$keys] == $key ? 1 : 0
                ];
            }
        }

        foreach ($data['question'] as $key => $question) {
            $insertQuestion = Question::create([
                'title' => $question,
                'subject_id' => $data['subject_id']
            ]);

            foreach ($data['answer'][$key] as $answer) {
                $insertAnswer = Answer::create([
                    'content' => $answer['content'],
                    'is_correct' => $answer['is_correct'],
                    'question_id' => $insertQuestion->id
                ]);
            }
        }

        if ($insertQuestion && $insertAnswer) {
            $insertQuestion->save();

            return redirect()->route('admin.question.index');
        }

        return redirect()->back();
    }
}
