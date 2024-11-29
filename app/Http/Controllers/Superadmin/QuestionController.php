<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;


class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('quiz')->get();
        $quizzes = Quiz::all();
        return view('admin.manage-questions', compact('questions', 'quizzes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question' => 'required|string|max:255',
        ]);

        Question::create($request->all());

        return redirect()->route('question.index')->with('success', 'Question created successfully.');
    }

    public function update(Request $request, Question $question)
    {
        $request->validate([
            'quiz_id' => 'required|exists:quizzes,id',
            'question' => 'required|string|max:255',
        ]);

        $question->update($request->all());

        return redirect()->route('question.index')->with('success', 'Question updated successfully.');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('question.index')->with('success', 'Question deleted successfully.');
    }
}
