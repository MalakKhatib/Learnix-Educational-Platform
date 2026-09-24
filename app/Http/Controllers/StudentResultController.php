<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;

class StudentResultController extends Controller
{
  public function index()
{
    $results = QuizAttempt::with([
        'quiz.course',
        'quiz.questions'
    ])
    ->where(
        'user_id',
        auth()->id()
    )
    ->latest()
    ->get();


    // عدد الاختبارات المحلولة

    $totalSolved =
    $results->count();


    // أفضل نتيجة

    $bestScore = 0;

    foreach($results as $result)
    {
        $totalQuestions =
        $result->quiz->questions->count();

        if($totalQuestions == 0)
        {
            continue;
        }

        $percentage = round(
            ($result->score / $totalQuestions)
            * 100
        );

        if($percentage > $bestScore)
        {
            $bestScore = $percentage;
        }
    }


    // متوسط النتائج

    $averageScore = 0;

    if($totalSolved > 0)
    {
        $sum = 0;

        foreach($results as $result)
        {
            $totalQuestions =
            $result->quiz->questions->count();

            if($totalQuestions == 0)
            {
                continue;
            }

            $sum += round(
                ($result->score /
                $totalQuestions)
                *100
            );
        }

        $averageScore =
        round($sum / $totalSolved);
    }


    return view(
        'student.results.index',
        compact(
            'results',
            'totalSolved',
            'averageScore',
            'bestScore'
        )
    );
}
}