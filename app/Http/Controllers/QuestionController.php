<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Quiz;

class QuestionController extends Controller
{
    //

public function create(Quiz $quiz)
{
    return view('teacher.questions.create', compact('quiz'));
}

public function store(
    Request $request,
    Quiz $quiz
)
{
    $request->validate([

        'question_text' =>
            'required',

        'option_1' =>
            'required',

        'option_2' =>
            'required',

        'option_3' =>
            'required',

        'option_4' =>
            'required',

        'correct_answer' =>
            'required'
    ]);

    $question = Question::create([

        'quiz_id' =>
            $quiz->id,

        'question_text' =>
            $request->question_text
    ]);

    $answers = [

        $request->option_1,
        $request->option_2,
        $request->option_3,
        $request->option_4
    ];

    foreach ($answers as $index => $answer) {

        Answer::create([

            'question_id' =>
                $question->id,

            'answer_text' =>
                $answer,

            'is_correct' =>
                $request->correct_answer
                    == ($index + 1)
        ]);
    }

    return redirect(
        "/teacher/quizzes/$quiz->id"
    )->with(
        'success',
        'تم إضافة السؤال'
    );
}

public function destroy(
    Question $question
)
{
    $question->delete();

    return redirect()
        ->back()
        ->with(
            'success',
            'تم حذف السؤال'
        );
}
public function edit(
    Question $question
)
{
    $question->load('answers');

    return view(
        'teacher.questions.edit',
        compact('question')
    );
}

public function update(
    Request $request,
    Question $question
)
{
    $request->validate([

        'question_text' =>
            'required',

        'option_1' =>
            'required',

        'option_2' =>
            'required',

        'option_3' =>
            'required',

        'option_4' =>
            'required',

        'correct_answer' =>
            'required'
    ]);

    $question->update([

        'question_text' =>
            $request->question_text
    ]);

    $answers =
        $question->answers;

    $answers[0]->update([
        'answer_text' =>
            $request->option_1,

        'is_correct' =>
            $request->correct_answer == 1
    ]);

    $answers[1]->update([
        'answer_text' =>
            $request->option_2,

        'is_correct' =>
            $request->correct_answer == 2
    ]);

    $answers[2]->update([
        'answer_text' =>
            $request->option_3,

        'is_correct' =>
            $request->correct_answer == 3
    ]);

    $answers[3]->update([
        'answer_text' =>
            $request->option_4,

        'is_correct' =>
            $request->correct_answer == 4
    ]);

    return redirect(
        "/teacher/quizzes/" .
        $question->quiz_id
    )->with(
        'success',
        'تم تعديل السؤال'
    );
}
}
