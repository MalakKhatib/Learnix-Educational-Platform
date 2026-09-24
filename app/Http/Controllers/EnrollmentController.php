<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // ==========================================
    // جميع الكورسات
    // ==========================================

    public function index(Request $request)
    {
        $search = $request->search;

        $categoryId = $request->category_id;


        // ==========================================
        // جلب الكورسات
        // ==========================================

        $query = Course::with([
            'teacher',
            'category'
        ]);


        // ==========================================
        // البحث
        // ==========================================

        if ($search) {

            $query->where(function ($q) use ($search) {

                $q->where(
                    'title',
                    'like',
                    "%{$search}%"
                )

                ->orWhere(
                    'description',
                    'like',
                    "%{$search}%"
                )

                ->orWhereHas(
                    'teacher',
                    function ($teacherQuery) use ($search) {

                        $teacherQuery->where(
                            'name',
                            'like',
                            "%{$search}%"
                        );

                    }
                );

            });

        }


        // ==========================================
        // الفلترة حسب التصنيف
        // ==========================================

        if ($categoryId) {

            $query->where(
                'category_id',
                $categoryId
            );

        }


        // ==========================================
        // النتائج
        // ==========================================

        $courses = $query
            ->latest()
            ->get();


        // ==========================================
        // جميع التصنيفات
        // ==========================================

        $categories = Category::orderBy('name')
            ->get();

$enrolledCourseIds = auth()->user()
    ->enrolledCourses()
    ->pluck('courses.id')
    ->toArray();

        // ==========================================
        // إرسال البيانات للصفحة
        // ==========================================

        return view(
            'student.courses.index',
            compact(
                'courses',
                'search',
                'categories',
                'categoryId',
                'enrolledCourseIds'
            )
        );
    }


    // ==========================================
    // التسجيل بالكورس
    // ==========================================

public function store(Course $course)
{
    $user = auth()->user();

    if (
        $user->enrolledCourses()
            ->where('course_id', $course->id)
            ->exists()
    ) {

        return back()->with(
            'info',
            'أنت مسجل بهذا الكورس مسبقاً'
        );
    }


    $user->enrolledCourses()->attach(
        $course->id
    );


    return back()->with(
        'success',
        'تم التسجيل بالكورس بنجاح'
    );
}

    // ==========================================
    // كورساتي
    // ==========================================

    public function myCourses()
    {
        $courses = auth()
            ->user()
            ->enrolledCourses;

        return view(
            'student.courses.my-courses',
            compact('courses')
        );
    }
}