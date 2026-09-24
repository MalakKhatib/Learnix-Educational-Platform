<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Attendance;

class StudentLessonController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | عرض الدرس
    |--------------------------------------------------------------------------
    */

public function show($lesson_id)
{
    $lesson = Lesson::with('course')->findOrFail($lesson_id);

    Progress::firstOrCreate(
        [
            'user_id' => auth()->id(),
            'lesson_id' => $lesson->id,
        ],
        [
            'completed' => false,
            'completed_at' => null,
        ]
    );

    $completed = Progress::where('user_id', auth()->id())
        ->where('lesson_id', $lesson->id)
        ->where('completed', true)
        ->exists();

    $attendanceRecorded = Attendance::where('user_id', auth()->id())
        ->where('lesson_id', $lesson->id)
        ->where('date', now()->toDateString())
        ->where('status', 'present')
        ->exists();

    /*
    |--------------------------------------------------------------------------
    | Lesson Comments
    |--------------------------------------------------------------------------
    */

    $comments = \App\Models\LessonComment::with([
        'user',
        'replies.user',
    ])
        ->where('lesson_id', $lesson->id)
        ->whereNull('parent_id')
        ->latest()
        ->get();

    return view('student.lessons.show', compact(
        'lesson',
        'completed',
        'attendanceRecorded',
        'comments'
    ));
}

    /*
    |--------------------------------------------------------------------------
    | إكمال الدرس
    |--------------------------------------------------------------------------
    */

    public function complete($lesson_id)
    {
        /*
        |--------------------------------------------------------------------------
        | التأكد أن الدرس موجود
        |--------------------------------------------------------------------------
        */

        $lesson = Lesson::findOrFail($lesson_id);


        /*
        |--------------------------------------------------------------------------
        | تحويل حالة Progress إلى مكتمل
        |--------------------------------------------------------------------------
        */

        Progress::updateOrCreate(

            [
                'user_id' => auth()->id(),
                'lesson_id' => $lesson->id,
            ],

            [
                'completed' => true,
                'completed_at' => now(),
            ]

        );


        return back()->with(
            'success',
            'تم إنهاء الدرس'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | نسبة التقدم في الكورس
    |--------------------------------------------------------------------------
    */

    public function progress($course_id)
    {
        $course = Course::with('lessons')
            ->findOrFail($course_id);


        /*
        |--------------------------------------------------------------------------
        | إجمالي الدروس
        |--------------------------------------------------------------------------
        */

        $totalLessons = $course->lessons->count();


        /*
        |--------------------------------------------------------------------------
        | معرفات دروس الكورس
        |--------------------------------------------------------------------------
        */

        $lessonIds = $course->lessons
            ->pluck('id');


        /*
        |--------------------------------------------------------------------------
        | الدروس المكتملة
        |--------------------------------------------------------------------------
        */

        $completedLessons = 0;

        if ($lessonIds->isNotEmpty()) {

            $completedLessons = Progress::where(
                'user_id',
                auth()->id()
            )
            ->whereIn(
                'lesson_id',
                $lessonIds
            )
            ->where(
                'completed',
                true
            )
            ->count();
        }


        /*
        |--------------------------------------------------------------------------
        | الدروس قيد التعلم
        |--------------------------------------------------------------------------
        */

        $inProgressLessons = 0;

        if ($lessonIds->isNotEmpty()) {

            $inProgressLessons = Progress::where(
                'user_id',
                auth()->id()
            )
            ->whereIn(
                'lesson_id',
                $lessonIds
            )
            ->where(
                'completed',
                false
            )
            ->count();
        }


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
        | نسبة الإنجاز العامة للكورس
        |--------------------------------------------------------------------------
        */

        $percentage = 0;

        if ($totalLessons > 0) {

            $percentage = round(
                ($completedLessons / $totalLessons) * 100
            );
        }


        /*
        |--------------------------------------------------------------------------
        | نسبة المكتمل
        |--------------------------------------------------------------------------
        */

        $completedPercentage = 0;

        if ($totalLessons > 0) {

            $completedPercentage = round(
                ($completedLessons / $totalLessons) * 100
            );
        }


        /*
        |--------------------------------------------------------------------------
        | نسبة قيد التعلم
        |--------------------------------------------------------------------------
        */

        $inProgressPercentage = 0;

        if ($totalLessons > 0) {

            $inProgressPercentage = round(
                ($inProgressLessons / $totalLessons) * 100
            );
        }


        /*
        |--------------------------------------------------------------------------
        | نسبة لم يبدأ
        |
        | نأخذ الباقي حتى يكون مجموع النسب = 100%
        |--------------------------------------------------------------------------
        */

        $notStartedPercentage = 0;

        if ($totalLessons > 0) {

            $notStartedPercentage =
                100
                - $completedPercentage
                - $inProgressPercentage;

            $notStartedPercentage = max(
                0,
                $notStartedPercentage
            );
        }


        /*
        |--------------------------------------------------------------------------
        | الدروس المتبقية
        |--------------------------------------------------------------------------
        */

        $remainingLessons = max(
            0,
            $totalLessons - $completedLessons
        );


        return view(
            'student.progress.index',
            compact(
                'course',
                'completedLessons',
                'inProgressLessons',
                'notStartedLessons',
                'totalLessons',
                'remainingLessons',
                'percentage',
                'completedPercentage',
                'inProgressPercentage',
                'notStartedPercentage'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | بدء متابعة الحضور
    |--------------------------------------------------------------------------
    */

    public function startAttendance(Lesson $lesson)
    {
        Attendance::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'lesson_id' => $lesson->id,
                'date' => now()->toDateString(),
            ],
            [
                'status' => 'absent',
            ]
        );


        return response()->json([
            'success' => true,
            'message' => 'بدأت متابعة حضور الدرس'
        ]);
    }
}
