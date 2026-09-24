<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\Progress;
use App\Models\Attendance;
use App\Models\QuizAttempt;

class AdminReportController extends Controller
{
    public function index()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalCourses = Course::count();
        $totalLessons = Lesson::count();
        $totalQuizzes = Quiz::count();

        $platformStatistics = [
            $totalStudents,
            $totalTeachers,
            $totalCourses
        ];

        /*
        |--------------------------------------------------------------------------
        | All Users
        |--------------------------------------------------------------------------
        */

        $users = User::latest()->get();

        return view('admin.reports.index', compact(
            'totalStudents',
            'totalTeachers',
            'totalCourses',
            'totalLessons',
            'totalQuizzes',
            'platformStatistics',
            'users'
        ));
    }
}
