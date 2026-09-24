<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::with([
            'teacher',
            'students',
            'lessons'
        ])
        ->latest()
        ->paginate(5);

        return view(
            'admin.courses.index',
            compact('courses')
        );
    }


    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with(
            'success',
            'تم حذف الكورس'
        );
    }
}