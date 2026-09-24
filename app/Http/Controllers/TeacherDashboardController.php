<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $teacher = auth()->user();


        // ==========================================
        // كورسات المعلم
        // ==========================================

        $courses = Course::with('students')
            ->where('teacher_id', $teacher->id)
            ->latest()
            ->get();


        // ==========================================
        // عدد الكورسات
        // ==========================================

        $totalCourses = $courses->count();


        // ==========================================
        // أسماء الكورسات
        // ==========================================

        $courseNames = $courses
            ->pluck('title')
            ->values()
            ->toArray();


        // ==========================================
        // عدد الطلاب في كل كورس
        // ==========================================

        $studentsCount = $courses
            ->map(function ($course) {

                return $course->students->count();

            })
            ->values()
            ->toArray();


        // ==========================================
        // إجمالي عدد الطلاب
        // ==========================================

        $totalStudents = $courses->sum(function ($course) {

            return $course->students->count();

        });


        // ==========================================
        // عدد الدروس
        // ==========================================

        $totalLessons = Lesson::whereHas(
            'course',
            function ($query) use ($teacher) {

                $query->where(
                    'teacher_id',
                    $teacher->id
                );

            }
        )->count();


        // ==========================================
        // عدد الاختبارات
        // ==========================================

        $totalQuizzes = Quiz::whereHas(
            'course',
            function ($query) use ($teacher) {

                $query->where(
                    'teacher_id',
                    $teacher->id
                );

            }
        )->count();


        // ==========================================
        // إرسال البيانات للوحة المعلم
        // ==========================================

        return view(
            'teacher.dashboard',
            compact(
                'totalCourses',
                'totalStudents',
                'totalLessons',
                'totalQuizzes',
                'courseNames',
                'studentsCount'
            )
        );
    }
}
