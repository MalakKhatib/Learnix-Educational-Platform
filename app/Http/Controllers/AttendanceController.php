<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Lesson;

class AttendanceController extends Controller
{
    /**
     * تسجيل حضور الطالب بعد مشاهدة النسبة المطلوبة من الفيديو
     */
    public function record(Request $request, Lesson $lesson)
    {
        /*
        |--------------------------------------------------------------------------
        | التحقق من البيانات
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'watched_seconds' => 'required|numeric|min:0',
            'video_duration' => 'required|numeric|min:1',
        ]);


        /*
        |--------------------------------------------------------------------------
        | حساب نسبة المشاهدة
        |--------------------------------------------------------------------------
        */

        $watchedSeconds =
            (float) $request->watched_seconds;

        $videoDuration =
            (float) $request->video_duration;


        $percentage =
            ($watchedSeconds / $videoDuration) * 100;


        /*
        |--------------------------------------------------------------------------
        | الحد الأدنى للحضور
        |--------------------------------------------------------------------------
        */

        $requiredPercentage = 70;


        /*
        |--------------------------------------------------------------------------
        | إذا لم يشاهد الطالب 70%
        |--------------------------------------------------------------------------
        */

        if ($percentage < $requiredPercentage) {

            return response()->json([
                'success' => false,
                'message' => 'لم تصل إلى نسبة المشاهدة المطلوبة للحضور.',
                'percentage' => round($percentage, 2),
            ], 422);
        }


        /*
        |--------------------------------------------------------------------------
        | تسجيل الحضور
        |--------------------------------------------------------------------------
        */

        $attendance = Attendance::updateOrCreate(

            [
                'user_id' => auth()->id(),

                'lesson_id' => $lesson->id,

                'date' => today(),
            ],

            [
                'started_at' => now(),

                'total_minutes' =>
                    max(
                        1,
                        (int) ceil(
                            $watchedSeconds / 60
                        )
                    ),

                'status' => 'present',
            ]

        );


        /*
        |--------------------------------------------------------------------------
        | النتيجة
        |--------------------------------------------------------------------------
        */

        return response()->json([

            'success' => true,

            'message' =>
                'تم تسجيل حضورك لهذا الدرس بنجاح.',

            'attendance' => $attendance,

            'percentage' =>
                round($percentage, 2),

        ]);
    }


    /**
 * عرض حضور الطلاب للمدرس
 */
public function teacherAttendance(Lesson $lesson)
{
    // التأكد أن الدرس تابع لكورس يخص المدرس الحالي
    if ($lesson->course->teacher_id != auth()->id()) {
        abort(403);
    }

    // جلب سجلات الحضور الخاصة بهذا الدرس
    $attendances = Attendance::with('user')
        ->where('lesson_id', $lesson->id)
        ->orderBy('date', 'desc')
        ->get();

    return view('teacher.attendance.index', compact(
        'lesson',
        'attendances'
    ));
}

/**
 * تقرير حضور الطلاب في الكورس كاملًا
 */
/**
 * تقرير حضور الطلاب في الكورس كاملًا
 */
public function courseAttendance(Request $request, $course_id)
{
    // جلب الكورس مع دروسه
    $course = \App\Models\Course::with('lessons')
        ->findOrFail($course_id);

    // التأكد أن الكورس تابع للمدرس الحالي
    if ($course->teacher_id != auth()->id()) {
        abort(403);
    }

    // جميع الطلاب المسجلين بالكورس
    $students = $course->students()->get();

    // الفلاتر
    $selectedStudent = $request->student_id;
    $selectedLesson = $request->lesson_id;

    // جلب سجلات الحضور الخاصة بدروس هذا الكورس
    $attendances = Attendance::with('user', 'lesson')
        ->whereIn(
            'lesson_id',
            $course->lessons->pluck('id')
        )
        ->get();

    // فلتر الطالب
    if ($selectedStudent) {

        $attendances = $attendances
            ->where('user_id', $selectedStudent);
    }

    // فلتر الدرس
    if ($selectedLesson) {

        $attendances = $attendances
            ->where('lesson_id', $selectedLesson);
    }

    /*
    |--------------------------------------------------------------------------
    | الإحصائيات
    |--------------------------------------------------------------------------
    */

    $studentsCount = $students->count();

    $lessonsCount = $course->lessons->count();


    /*
    |--------------------------------------------------------------------------
    | عدد حالات الحضور
    |--------------------------------------------------------------------------
    |
    | نحسب كل طالب + درس مرة واحدة فقط.
    | حتى لو كان لديه أكثر من سجل حضور.
    |
    */

    $presentCount = $attendances
        ->where('status', 'present')
        ->map(function ($attendance) {

            return $attendance->user_id . '-' . $attendance->lesson_id;

        })
        ->unique()
        ->count();


    /*
    |--------------------------------------------------------------------------
    | الحالات الممكنة
    |--------------------------------------------------------------------------
    */

    if ($selectedStudent && $selectedLesson) {

        // طالب واحد + درس واحد
        $totalPossibleAttendance = 1;

    } elseif ($selectedStudent) {

        // طالب واحد + جميع الدروس
        $totalPossibleAttendance = $lessonsCount;

    } elseif ($selectedLesson) {

        // جميع الطلاب + درس واحد
        $totalPossibleAttendance = $studentsCount;

    } else {

        // جميع الطلاب + جميع الدروس
        $totalPossibleAttendance =
            $studentsCount * $lessonsCount;
    }


    /*
    |--------------------------------------------------------------------------
    | نسبة الحضور
    |--------------------------------------------------------------------------
    */

    $attendancePercentage =
        $totalPossibleAttendance > 0
            ? round(
                ($presentCount / $totalPossibleAttendance) * 100
            )
            : 0;


    /*
    |--------------------------------------------------------------------------
    | إرسال البيانات إلى صفحة التقرير
    |--------------------------------------------------------------------------
    */

    return view(
        'teacher.attendance.course',
        compact(
            'course',
            'students',
            'attendances',
            'studentsCount',
            'lessonsCount',
            'presentCount',
            'attendancePercentage',
            'selectedStudent',
            'selectedLesson'
        )
    );
}
}
