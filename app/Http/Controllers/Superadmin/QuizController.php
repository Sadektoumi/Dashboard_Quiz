<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;

use App\Models\Quiz;
use App\Models\Category;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('category')->get();
        $categories = Category::all();
        return view('admin.manage-quizes', compact('quizzes', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title'=>'required',
            'date' => 'required|date',
            'time_limit' => 'required|integer',
            'attempts_allowed' => 'required|integer',
            'points' => 'required|integer',
            'instructions' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Quiz::create($request->all());

        return redirect()->route('quiz.index')->with('success', 'Quiz created successfully.');
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'date' => 'required|date',
            'time_limit' => 'required|integer',
            'attempts_allowed' => 'required|integer',
            'points' => 'required|integer',
            'instructions' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $quiz->update($request->all());

        return redirect()->route('quiz.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return redirect()->route('quiz.index')->with('success', 'Quiz deleted successfully.');
    }
}
