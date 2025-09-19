<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    public function index()
    {
        $questions = Question::inRandomOrder()->get();
        Session::put('exam_questions', $questions);
        Session::put('current_question', 0);
        Session::put('score', 0);
        
        return redirect()->route('exam.show', 0);
    }

    public function show($id)
    {
        $questions = Session::get('exam_questions');
        
        if (!$questions || !isset($questions[$id])) {
            return redirect()->route('exam.results');
        }
        
        $question = $questions[$id];
        return view('exam.show', compact('question', 'id'));
    }

    public function answer(Request $request, $id)
    {
        $questions = Session::get('exam_questions');
        $current_question = $questions[$id];
        
        $selected_answer = $request->input('answer');
        $score = Session::get('score', 0);
        
        if ($selected_answer == $current_question->correct_answer) {
            $score++;
            Session::put('score', $score);
        }
        
        $next_question = $id + 1;
        
        if ($next_question < count($questions)) {
            Session::put('current_question', $next_question);
            return redirect()->route('exam.show', $next_question);
        } else {
            return redirect()->route('exam.results');
        }
    }

    public function results()
    {
        $score = Session::get('score', 0);
        $total_questions = count(Session::get('exam_questions', []));
        
        Session::forget(['exam_questions', 'current_question', 'score']);
        
        return view('exam.results', compact('score', 'total_questions'));
    }
}