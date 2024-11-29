<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;




use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::with('question')->get();
        $questions = Question::all();
        return view('admin.manage-answers', compact('answers', 'questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|string|max:255',
            'is_correct' => 'required|boolean',
        ]);

        Answer::create($request->all());

        return redirect()->route('answer.index')->with('success', 'Answer created successfully.');
    }

    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'question_id' => 'required|exists:questions,id',
            'answer' => 'required|string|max:255',
            'is_correct' => 'required|boolean',
        ]);

        $answer->update($request->all());

        return redirect()->route('answer.index')->with('success', 'Answer updated successfully.');
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('answer.index')->with('success', 'Answer deleted successfully.');
    }
}

