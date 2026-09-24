<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Progress;
use App\Models\QuizAttempt;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function download(Course $course)
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | التحقق من إكمال جميع دروس الكورس
        |--------------------------------------------------------------------------
        */

        $lessonIds = $course->lessons()->pluck('id');

        $totalLessons = $lessonIds->count();

        $completedProgress = Progress::where('user_id', $user->id)
            ->whereIn('lesson_id', $lessonIds)
            ->where('completed', true)
            ->get();

        $completedLessons = $completedProgress
            ->pluck('lesson_id')
            ->unique()
            ->count();

        if (
            $totalLessons === 0 ||
            $completedLessons < $totalLessons
        ) {
            return back()->with(
                'error',
                'لا يمكنك تحميل الشهادة قبل إكمال جميع دروس الكورس.'
            );
        }

   /*
|--------------------------------------------------------------------------
| حساب الأداء النهائي في الكورس
|--------------------------------------------------------------------------
|
| يتم احتساب جميع محاولات الطالب في اختبارات الكورس.
| مثال:
| المحاولة الأولى 100%
| المحاولة الثانية 0%
| النتيجة النهائية = 50%
|
*/

$attempts = QuizAttempt::with('quiz.questions')
    ->where('user_id', $user->id)
    ->whereHas('quiz', function ($query) use ($course) {
        $query->where('course_id', $course->id);
    })
    ->get();

$totalCorrectAnswers = 0;
$totalQuestions = 0;
$totalAttempts = 0;

foreach ($attempts as $attempt) {

    if (!$attempt->quiz) {
        continue;
    }

    $quizQuestionsCount = $attempt->quiz->questions->count();

    if ($quizQuestionsCount <= 0) {
        continue;
    }

    $totalCorrectAnswers += $attempt->score;

    $totalQuestions += $quizQuestionsCount;

    $totalAttempts++;
}

/*
|--------------------------------------------------------------------------
| الأداء النهائي
|--------------------------------------------------------------------------
*/

$averagePerformance = $totalAttempts > 0 && $totalQuestions > 0
    ? round(
        ($totalCorrectAnswers / $totalQuestions) * 100
    )
    : null;

/*
|--------------------------------------------------------------------------
| عدد الاختبارات
|--------------------------------------------------------------------------
*/

$quizCount = $attempts
    ->pluck('quiz_id')
    ->unique()
    ->count();

        /*
        |--------------------------------------------------------------------------
        | تاريخ إتمام الكورس
        |--------------------------------------------------------------------------
        */

        $completionProgress = $completedProgress
            ->sortByDesc('completed_at')
            ->first();

        $completionDate = $completionProgress
            ? $completionProgress->completed_at
            : now();

        /*
        |--------------------------------------------------------------------------
        | رقم الشهادة
        |--------------------------------------------------------------------------
        */

        $certificateNumber =
            'LX-' .
            $course->id .
            '-' .
            $user->id .
            '-' .
            now()->format('Ymd');

        /*
        |--------------------------------------------------------------------------
        | إنشاء الشهادة
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView(
            'pdf.certificate',
            compact(
                'user',
                'course',
                'completionDate',
                'averagePerformance',
                'quizCount',
                'certificateNumber'
            )
        );

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download(
            'Learnix-Certificate-' . $course->id . '.pdf'
        );
    }
}
