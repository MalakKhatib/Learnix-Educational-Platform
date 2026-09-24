<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Quiz;
use App\Models\Course;
class QuizController extends Controller
{
    //

public function create(Course $course)
{
    return view('teacher.quizzes.create', compact('course'));
}

public function store(
    Request $request,
    Course $course
)
{
    $request->validate([
        'title' => 'required|max:255'
    ]);

    Quiz::create([
        'course_id' => $course->id,
        'title' => $request->title
    ]);

    return redirect(
        "/teacher/courses/$course->id"
    )->with(
        'success',
        'تم إنشاء الاختبار بنجاح'
    );
}

public function show(Quiz $quiz)
{
    $quiz->load('questions.answers');

    return view(
        'teacher.quizzes.show',
        compact('quiz')
    );
}

public function edit(Quiz $quiz)
{
    return view(
        'teacher.quizzes.edit',
        compact('quiz')
    );
}
public function update(Request $request, Quiz $quiz)
{
    $request->validate([
        'title' => ['required', 'string', 'max:255'],
    ]);

    $quiz->update([
        'title' => $request->title,
    ]);

return redirect()
    ->route('teacher.courses.show', $quiz->course_id)
    ->with('success', 'تم تعديل الاختبار بنجاح.');
}

public function destroy(Quiz $quiz)
{
    $quiz->delete();

    return redirect()
        ->back()
        ->with('success',
            'تم حذف الاختبار');
}
}
