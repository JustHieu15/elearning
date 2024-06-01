<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Collection;
use App\Models\Subject;
use App\Models\CollectionQuestion;
use App\Models\Question;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::join('subject', 'collection.subject_id', '=', 'subject.id')
            ->select('collection.*', 'subject.name as subject_name')
            ->get();

        $subjectId = $collections->pluck('subject_id')->toArray();

        $questions = Question::join('subject', 'question.subject_id', '=', 'subject.id')
            ->select('question.*', 'subject.name as subject_name')
            ->whereIn('subject_id', $subjectId)
            ->get();

        $collectionQuestion = CollectionQuestion::all();

        $answer = Question::join('answer', 'question.id', '=', 'answer.question_id')
            ->select('answer.*')
            ->get()
            ->groupBy('question_id');

        return view('admin.collection.index', compact('collections', 'questions', 'answer', 'collectionQuestion'));
    }

    public function create()
    {
        $collection = Collection::orderBy('id', 'desc')->first();
        $subjects = Subject::all();

        if (empty($collection)) {
            $collection = new Collection();
            $collection->id = 1;
        } else {
            $collection->id += 1;
        }

        return view('admin.collection.create', compact('collection', 'subjects'));
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required|unique:collections|max:255',
//            'subject_id' => 'required',
//        ]);

        $data = $request->all();

        $insertCollection = Collection::create([
            'name' => $data['name'],
            'subject_id' => $data['subject_id'],
        ]);

        if ($insertCollection) {
            $insertCollection->save();

            return redirect()->route('admin.collection.index')->with('success', 'Collection created successfully');
        }

        return back()->with('error', 'Something went wrong');
    }

    public function addQuestion(Request $request, $slug)
    {
        $request->session()->put('collection_slug', $slug);

        $collection = Collection::join('subject', 'collection.subject_id', '=', 'subject.id')
            ->select('collection.*', 'subject.name as subject_name', 'subject.id as subject_id')
            ->where('collection.slug', $slug)
            ->first();

        $questions = Question::where('subject_id', $collection->subject_id)->get();

        $collectionQuestions = CollectionQuestion::where('collection_id', $collection->id)->get()->pluck('question_id')->toArray();

        foreach($questions as $key => $question) {
            if(in_array($question->id, $collectionQuestions)) {
                $questions[$key]->checked = true;
            } else {
                $questions[$key]->checked = false;
            }
        }

        return view('admin.collection.add-question', compact('collection', 'questions', 'collectionQuestions'));
    }

    public function storeQuestion(Request $request)
    {
        $data = $request->all();

        $slug = $request->session()->get('collection_slug');

        $collection = Collection::where('slug', $slug)->first();

        $questionId = $data['question_id'];

        $insertCollectionQuestion = null;

        foreach ($questionId as $key => $value) {
            $insertCollectionQuestion = CollectionQuestion::create([
                'collection_id' => $collection->id,
                'question_id' => $value,
            ]);
        }

        if ($insertCollectionQuestion) {
            return redirect()->route('admin.collection.index')->with('success', 'Question added successfully');
        }

        return back()->with('error', 'Something went wrong');
    }

    public function edit(Request $request,$slug)
    {
        $request->session()->put('collection_slug', $slug);

        $collection = Collection::join('subject', 'collection.subject_id', '=', 'subject.id')
            ->select('collection.*', 'subject.name as subject_name', 'subject.id as subject_id')
            ->where('collection.slug', $slug)
            ->first();

        return view('admin.collection.edit', compact('collection'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $slug = $request->session()->get('collection_slug');

        $updateCollection = Collection::where('slug', $slug)->first();

        if ($updateCollection) {
            $updateCollection->update([
                'name' => $data['name'],
            ]);

            $updateCollection->save();

            return redirect()->route('admin.collection.index')->with('success', 'Collection updated successfully');
        }

        return back()->with('error', 'Something went wrong');
    }
}
