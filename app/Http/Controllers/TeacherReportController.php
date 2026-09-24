<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;

class TeacherReportController extends Controller
{
    public function index()
    {
        $teacherId = auth()->id();


        // عدد الكورسات

        $totalCourses = Course::where(
            'teacher_id',
            $teacherId
        )->count();


        // عدد الدروس

        $totalLessons = Lesson::whereHas(
            'course',
            function ($q) use ($teacherId) {

                $q->where(
                    'teacher_id',
                    $teacherId
                );

            }
        )->count();


        // عدد الاختبارات

        $totalQuizzes = Quiz::whereHas(
            'course',
            function ($q) use ($teacherId) {

                $q->where(
                    'teacher_id',
                    $teacherId
                );

            }
        )->count();


        // جميع كورسات المعلم

        $courses = Course::where(
            'teacher_id',
            $teacherId
        )->get();


        // عدد الطلاب

        $totalStudents = 0;

        foreach ($courses as $course)
        {
            $totalStudents +=
                $course->students()->count();
        }


        // بيانات الرسم البياني

        $courseNames = [];

        $studentsCount = [];

        foreach ($courses as $course)
        {
            $courseNames[] =
                $course->title;

            $studentsCount[] =
                $course->students()->count();
        }


        return view(

            'teacher.reports.index',

            compact(

                'totalCourses',
                'totalLessons',
                'totalQuizzes',
                'totalStudents',
                'courseNames',
                'studentsCount'

            )

        );
    }
}