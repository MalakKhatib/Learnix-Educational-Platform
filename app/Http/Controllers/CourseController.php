<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Attendance;
use App\Models\Progress;

class CourseController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | عرض الكورسات
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Teacher Courses
        |--------------------------------------------------------------------------
        */

        if (auth()->user()->role == 'teacher') {

            $courses = Course::where(
                    'teacher_id',
                    auth()->id()
                )
                ->with('category')
                ->latest()
                ->get();

            return view(
                'teacher.courses.index',
                compact('courses')
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Student - Available Courses
        |--------------------------------------------------------------------------
        */

        $query = Course::with([
            'teacher',
            'category'
        ]);


        // البحث
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'title',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhere(
                    'description',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhereHas(
                    'teacher',
                    function ($teacherQuery) use ($search) {

                        $teacherQuery->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        );

                    }
                );

            });

        }


        // فلترة حسب التصنيف
        if ($request->filled('category_id')) {

            $query->where(
                'category_id',
                $request->category_id
            );

        }


        $courses = $query
            ->latest()
            ->get();


        // التصنيفات
        $categories = Category::orderBy('name')
            ->get();


        return view(
            'student.courses.index',
            compact(
                'courses',
                'categories'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | إنشاء كورس
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $categories = Category::orderBy('name')
            ->get();

        return view(
            'teacher.courses.create',
            compact('categories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | حفظ كورس جديد
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'category_id' => 'required|exists:categories,id',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);


        $imagePath = null;


        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store('courses', 'public');

        }


        Course::create([

            'title' => $request->title,

            'description' => $request->description,

            'category_id' => $request->category_id,

            'image' => $imagePath,

            'teacher_id' => auth()->id(),

        ]);


        return redirect()

            ->route('teacher.courses.index')

            ->with(
                'success',
                'تم إنشاء الكورس بنجاح'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | عرض الكورس
    |--------------------------------------------------------------------------
    */
public function show($course_id)
{
    $course = Course::with(['lessons', 'teacher', 'category'])
        ->findOrFail($course_id);

    $userId = auth()->id();

    /*
    |--------------------------------------------------------------------------
    | Teacher - عرض الكورس للمدرس
    |--------------------------------------------------------------------------
    */

    if (auth()->user()->role === 'teacher') {

        if ($course->teacher_id != $userId) {
            abort(403);
        }

        return view(
            'teacher.courses.show',
            compact('course')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Student - عرض الكورس للطالب
    |--------------------------------------------------------------------------
    */

    $totalLessons = $course->lessons->count();

    /*
    |--------------------------------------------------------------------------
    | الدروس المكتملة
    |--------------------------------------------------------------------------
    */

    $lessonIds = $course->lessons->pluck('id');

    $completedLessonIds = Progress::where('user_id', $userId)
        ->whereIn('lesson_id', $lessonIds)
        ->where('completed', true)
        ->pluck('lesson_id')
        ->unique()
        ->values()
        ->toArray();

    $completedLessons = count($completedLessonIds);

    /*
    |--------------------------------------------------------------------------
    | الدروس المتبقية
    |--------------------------------------------------------------------------
    */

    $remainingLessons = max(
        0,
        $totalLessons - $completedLessons
    );

    /*
    |--------------------------------------------------------------------------
    | نسبة الإنجاز
    |--------------------------------------------------------------------------
    */

    $progressPercentage = $totalLessons > 0
        ? round(($completedLessons / $totalLessons) * 100)
        : 0;

    /*
    |--------------------------------------------------------------------------
    | الحضور
    |--------------------------------------------------------------------------
    */

    $attendedLessonIds = Attendance::where(
            'user_id',
            $userId
        )
        ->whereIn(
            'lesson_id',
            $lessonIds
        )
        ->where(
            'status',
            'present'
        )
        ->pluck('lesson_id')
        ->unique()
        ->values();

    $attendedLessons = $attendedLessonIds->count();

    /*
    |--------------------------------------------------------------------------
    | نسبة الحضور
    |--------------------------------------------------------------------------
    */

    $attendancePercentage = $totalLessons > 0
        ? round(
            ($attendedLessons / $totalLessons) * 100
        )
        : 0;

    /*
    |--------------------------------------------------------------------------
    | حماية إضافية
    |--------------------------------------------------------------------------
    */

    $attendancePercentage = min(
        100,
        max(0, $attendancePercentage)
    );

    return view(
        'student.courses.show',
        compact(
            'course',
            'totalLessons',
            'completedLessons',
            'completedLessonIds',
            'remainingLessons',
            'progressPercentage',
            'attendedLessons',
            'attendancePercentage'
        )
    );
}

    /*
    |--------------------------------------------------------------------------
    | تعديل الكورس
    |--------------------------------------------------------------------------
    */
    public function edit(Course $course)
    {
        if ($course->teacher_id != auth()->id()) {
            abort(403);
        }

        return view(
            'teacher.courses.edit',
            compact('course')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | تحديث الكورس
    |--------------------------------------------------------------------------
    */
    public function update(
        Request $request,
        Course $course
    ) {
        if ($course->teacher_id != auth()->id()) {
            abort(403);
        }


        $request->validate([

            'title' => 'required|max:255',

            'description' => 'nullable',

            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',

        ]);


        $imagePath = $course->image;


        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store('courses', 'public');

        }


        $course->update([

            'title' => $request->title,

            'description' => $request->description,

            'image' => $imagePath,

        ]);


        return redirect()

            ->route('teacher.courses.index')

            ->with(
                'success',
                'تم تعديل الكورس بنجاح'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | حذف الكورس
    |--------------------------------------------------------------------------
    */
    public function destroy(Course $course)
    {
        if ($course->teacher_id != auth()->id()) {
            abort(403);
        }


        $course->delete();


        return redirect()

            ->route('teacher.courses.index')

            ->with(
                'success',
                'تم حذف الكورس'
            );
    }
}
