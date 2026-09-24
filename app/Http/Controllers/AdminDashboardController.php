<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalTeachers = User::where(
            'role',
            'teacher'
        )->count();


        $totalStudents = User::where(
            'role',
            'student'
        )->count();


        $totalCourses = Course::count();


        $totalLessons = Lesson::count();


        $totalQuizzes = Quiz::count();


        return view(

            'admin.dashboard',

            compact(

                'totalTeachers',
                'totalStudents',
                'totalCourses',
                'totalLessons',
                'totalQuizzes'

            )

        );
    }
}