<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\UserAnswer;

class StudentAttemptController extends Controller
{
    //

public function index($quiz_id)
{
    $attempts = QuizAttempt::where('user_id', auth()->id())
        ->where('quiz_id', $quiz_id)
        ->latest()
        ->get();

    $quiz = Quiz::findOrFail($quiz_id);

    return view('student.attempts.index', compact('attempts', 'quiz'));
}

public function show($attempt_id)
{
    $attempt =
        QuizAttempt::with([

    'quiz',
    'quiz.questions.answers',

    'userAnswers.question',
    'userAnswers.answer',

])->findOrFail($attempt_id);

    // حماية
    if (
        $attempt->user_id
        != auth()->id()
    ) {
        abort(403);
    }

    return view(
        'student.attempts.show',
        compact('attempt')
    );
}
}
