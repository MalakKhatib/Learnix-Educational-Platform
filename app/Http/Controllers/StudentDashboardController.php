<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\QuizAttempt;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | كورسات الطالب
        |--------------------------------------------------------------------------
        */

        $courses = $user->enrolledCourses()
            ->with('lessons')
            ->latest()
            ->get();

        $totalCourses = $courses->count();


        /*
        |--------------------------------------------------------------------------
        | آخر 3 كورسات
        |--------------------------------------------------------------------------
        */

        $latestCourses = $courses->take(3);


        /*
        |--------------------------------------------------------------------------
        | جميع دروس كورسات الطالب
        |--------------------------------------------------------------------------
        */

        $lessonIds = $courses
            ->flatMap(function ($course) {
                return $course->lessons;
            })
            ->pluck('id')
            ->unique()
            ->values();


        $totalLessons = $lessonIds->count();


        /*
        |--------------------------------------------------------------------------
        | Progress الخاص بالطالب وبهذه الدروس فقط
        |--------------------------------------------------------------------------
        */

        $progressRecords = collect();

        if ($lessonIds->isNotEmpty()) {
            $progressRecords = Progress::where('user_id', $user->id)
                ->whereIn('lesson_id', $lessonIds)
                ->get();
        }


        /*
        |--------------------------------------------------------------------------
        | الدروس المكتملة
        |--------------------------------------------------------------------------
        */

        $completedLessons = $progressRecords
            ->where('completed', true)
            ->pluck('lesson_id')
            ->unique()
            ->count();


        /*
        |--------------------------------------------------------------------------
        | الدروس قيد التعلم
        |
        | يوجد لها Progress Record
        | ولكن completed = false
        |--------------------------------------------------------------------------
        */

        $inProgressLessons = $progressRecords
            ->where('completed', false)
            ->pluck('lesson_id')
            ->unique()
            ->count();


        /*
        |--------------------------------------------------------------------------
        | الدروس التي لم يبدأ بها الطالب
        |--------------------------------------------------------------------------
        */

        $notStartedLessons = max(
            0,
            $totalLessons
            - $completedLessons
            - $inProgressLessons
        );


        /*
        |--------------------------------------------------------------------------
        | النسب
        |--------------------------------------------------------------------------
        */

        $percentage = 0;
        $completedPercentage = 0;
        $inProgressPercentage = 0;
        $notStartedPercentage = 0;

        if ($totalLessons > 0) {

            $percentage = round(
                ($completedLessons / $totalLessons) * 100
            );

            $completedPercentage = round(
                ($completedLessons / $totalLessons) * 100
            );

            $inProgressPercentage = round(
                ($inProgressLessons / $totalLessons) * 100
            );

            /*
            |--------------------------------------------------------------------------
            | نخلي النسبة الثالثة هي الباقي
            | حتى يكون مجموع النسب دائماً 100%
            |--------------------------------------------------------------------------
            */

            $notStartedPercentage =
                100
                - $completedPercentage
                - $inProgressPercentage;

            if ($notStartedPercentage < 0) {
                $notStartedPercentage = 0;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | حماية النسبة العامة
        |--------------------------------------------------------------------------
        */

        $percentage = min(
            100,
            max(0, $percentage)
        );


        /*
        |--------------------------------------------------------------------------
        | عدد الاختبارات المحلولة
        |--------------------------------------------------------------------------
        */

        $totalQuizzes = QuizAttempt::where(
            'user_id',
            $user->id
        )->count();


        /*
        |--------------------------------------------------------------------------
        | آخر 3 محاولات
        |--------------------------------------------------------------------------
        */

        $latestAttempts = QuizAttempt::with('quiz')
            ->where('user_id', $user->id)
            ->latest()
            ->take(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | متوسط النتائج
        |--------------------------------------------------------------------------
        */

        $averageScore = 0;

        $attempts = QuizAttempt::with('quiz.questions')
            ->where('user_id', $user->id)
            ->get();

        $scoreSum = 0;
        $scoreCount = 0;

        foreach ($attempts as $attempt) {

            if (!$attempt->quiz) {
                continue;
            }

            $questionsCount = $attempt->quiz->questions->count();

            if ($questionsCount <= 0) {
                continue;
            }

            $score = (
                $attempt->score / $questionsCount
            ) * 100;

            $score = min(
                100,
                max(0, $score)
            );

            $scoreSum += $score;
            $scoreCount++;
        }

        if ($scoreCount > 0) {
            $averageScore = round(
                $scoreSum / $scoreCount
            );
        }


        /*
        |--------------------------------------------------------------------------
        | إرسال البيانات للواجهة
        |--------------------------------------------------------------------------
        */

        return view(
            'student.dashboard',
            compact(
                'totalCourses',
                'totalQuizzes',
                'totalLessons',
                'completedLessons',
                'inProgressLessons',
                'notStartedLessons',
                'percentage',
                'completedPercentage',
                'inProgressPercentage',
                'notStartedPercentage',
                'averageScore',
                'latestCourses',
                'latestAttempts'
            )
        );
    }
}
