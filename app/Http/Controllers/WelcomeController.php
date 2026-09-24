<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\QuizAttempt;
use App\Models\Progress;

class WelcomeController extends Controller
{
    public function index()
    {
        // عدد الطلاب الحقيقي
        $studentsCount = User::where('role', 'student')->count();

        // عدد المعلمين الحقيقي
        $teachersCount = User::where('role', 'teacher')->count();

        // عدد المقررات الحقيقي
        $coursesCount = Course::count();

        // عدد الدروس الحقيقي
        $lessonsCount = Lesson::count();

        /*
        |--------------------------------------------------------------------------
        | عدد الدروس المكتملة
        |--------------------------------------------------------------------------
        */

        $completedLessonsCount = Progress::where('completed', true)->count();

        /*
        |--------------------------------------------------------------------------
        | متوسط نتائج الاختبارات
        |--------------------------------------------------------------------------
        */

        $averageScore = 0;

        $attempts = QuizAttempt::with('quiz.questions')->get();

        $validScores = [];

        foreach ($attempts as $attempt) {

            $totalQuestions = $attempt->quiz
                ? $attempt->quiz->questions->count()
                : 0;

            if ($totalQuestions > 0) {

                $percentage = ($attempt->score / $totalQuestions) * 100;

                $validScores[] = $percentage;
            }
        }

        if (count($validScores) > 0) {

            $averageScore = round(
                array_sum($validScores) / count($validScores)
            );
        }

        /*
        |--------------------------------------------------------------------------
        | نسبة التقدم العامة في المنصة
        |--------------------------------------------------------------------------
        */

        $totalProgressRecords = Progress::count();

        $overallProgress = 0;

        if ($totalProgressRecords > 0) {

            $overallProgress = round(
                ($completedLessonsCount / $totalProgressRecords) * 100
            );
        }

        return view('welcome', compact(
            'studentsCount',
            'teachersCount',
            'coursesCount',
            'lessonsCount',
            'completedLessonsCount',
            'averageScore',
            'overallProgress'
        ));
    }
}
