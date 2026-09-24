<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\Progress;
use App\Models\Attendance;

class ReportPdfController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Student Report
    |--------------------------------------------------------------------------
    */

    public function student()
    {
        return $this->generateStudentReport(auth()->user());
    }


    /*
    |--------------------------------------------------------------------------
    | Teacher Report
    |--------------------------------------------------------------------------
    */

    public function teacher()
    {
        return $this->generateTeacherReport(auth()->user());
    }


    /*
    |--------------------------------------------------------------------------
    | Admin Report
    |--------------------------------------------------------------------------
    */

    public function admin()
    {
        return $this->generateAdminReport(auth()->user());
    }


    /*
    |--------------------------------------------------------------------------
    | Report For Selected User
    |--------------------------------------------------------------------------
    |
    | This method is used by the administrator to generate
    | a report for any selected user.
    |
    */

    public function userReport(User $user)
    {
        switch ($user->role) {

            case 'student':
                return $this->generateStudentReport($user);

            case 'teacher':
                return $this->generateTeacherReport($user);

            case 'admin':
                return $this->generateAdminReport($user);

            default:
                abort(404);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Generate Student Report
    |--------------------------------------------------------------------------
    */

    private function generateStudentReport(User $user)
    {
        /*
        |--------------------------------------------------------------------------
        | Courses
        |--------------------------------------------------------------------------
        */

        $courses = $user->enrolledCourses()
            ->with([
                'teacher',
                'lessons'
            ])
            ->latest()
            ->get();

        $totalCourses = $courses->count();

        $allLessonIds = $courses
            ->flatMap(function ($course) {
                return $course->lessons->pluck('id');
            })
            ->unique()
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Lessons
        |--------------------------------------------------------------------------
        */

        $totalLessons = $allLessonIds->count();

        $completedLessonIds = Progress::where(
            'user_id',
            $user->id
        )
        ->where(
            'completed',
            true
        )
        ->whereIn(
            'lesson_id',
            $allLessonIds
        )
        ->pluck('lesson_id')
        ->unique();


        $completedLessons = $completedLessonIds->count();

        $remainingLessons = max(
            0,
            $totalLessons - $completedLessons
        );


        $completionPercentage = $totalLessons > 0
            ? round(($completedLessons / $totalLessons) * 100)
            : 0;


        /*
        |--------------------------------------------------------------------------
        | Course Progress
        |--------------------------------------------------------------------------
        */

        foreach ($courses as $course) {

            $courseLessonIds = $course->lessons
                ->pluck('id');

            $courseCompletedLessons = $courseLessonIds
                ->intersect($completedLessonIds)
                ->count();

            $courseTotalLessons = $courseLessonIds->count();

            $course->completed_lessons_count =
                $courseCompletedLessons;

            $course->total_lessons_count =
                $courseTotalLessons;

            $course->progress_percentage =
                $courseTotalLessons > 0
                    ? round(
                        ($courseCompletedLessons /
                        $courseTotalLessons) * 100
                    )
                    : 0;
        }


        /*
        |--------------------------------------------------------------------------
        | Quiz Attempts
        |--------------------------------------------------------------------------
        */

        $attempts = QuizAttempt::with([
            'quiz.questions',
            'quiz.course'
        ])
        ->where(
            'user_id',
            $user->id
        )
        ->latest()
        ->get();


        $totalAttempts = $attempts->count();

        $validScores = [];


        foreach ($attempts as $attempt) {

            $totalQuestions = $attempt->quiz
                ? $attempt->quiz->questions->count()
                : 0;


            if ($totalQuestions > 0) {

                $percentage = round(
                    ($attempt->score / $totalQuestions) * 100
                );

                $attempt->percentage = $percentage;

                $validScores[] = $percentage;

            } else {

                $attempt->percentage = 0;
            }
        }


        $averageScore = count($validScores) > 0
            ? round(
                array_sum($validScores) /
                count($validScores)
            )
            : 0;


        /*
        |--------------------------------------------------------------------------
        | Attendance
        |--------------------------------------------------------------------------
        */

        $attendanceRecords = Attendance::where(
            'user_id',
            $user->id
        )
        ->whereIn(
            'lesson_id',
            $allLessonIds
        )
        ->latest()
        ->get();


        $attendanceCount = $attendanceRecords
            ->where('status', 'present')
            ->count();


        $attendedLessonIds = $attendanceRecords
            ->where('status', 'present')
            ->pluck('lesson_id')
            ->unique();


        $attendancePercentage = $totalLessons > 0
            ? round(
                ($attendedLessonIds->count() /
                $totalLessons) * 100
            )
            : 0;


        /*
        |--------------------------------------------------------------------------
        | Generate PDF
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView(
            'pdf.student-report',
            compact(
                'user',
                'courses',
                'totalCourses',
                'totalLessons',
                'completedLessons',
                'remainingLessons',
                'completionPercentage',
                'attempts',
                'totalAttempts',
                'averageScore',
                'attendanceCount',
                'attendancePercentage'
            )
        );

        $pdf->setPaper('A4', 'portrait');

        return $pdf->download(
            'Student_Report_' .
            $this->safeFileName($user->name) .
            '.pdf'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Generate Teacher Report
    |--------------------------------------------------------------------------
    */

    private function generateTeacherReport(User $user)
    {
        /*
        |--------------------------------------------------------------------------
        | Courses
        |--------------------------------------------------------------------------
        */

        $courses = Course::where(
            'teacher_id',
            $user->id
        )
        ->with([
            'lessons',
            'students',
            'quizzes'
        ])
        ->latest()
        ->get();


        $totalCourses = $courses->count();


        /*
        |--------------------------------------------------------------------------
        | Lessons
        |--------------------------------------------------------------------------
        */

        $totalLessons = $courses->sum(
            function ($course) {
                return $course->lessons->count();
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Students
        |--------------------------------------------------------------------------
        |
        | Count unique students because one student may
        | be enrolled in multiple courses.
        |
        */

        $totalStudents = $courses
            ->flatMap(function ($course) {
                return $course->students->pluck('id');
            })
            ->unique()
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Quizzes
        |--------------------------------------------------------------------------
        */

        $totalQuizzes = $courses->sum(
            function ($course) {
                return $course->quizzes->count();
            }
        );


        /*
        |--------------------------------------------------------------------------
        | Generate PDF
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView(
            'pdf.teacher-report',
            compact(
                'user',
                'courses',
                'totalCourses',
                'totalLessons',
                'totalStudents',
                'totalQuizzes'
            )
        );

        $pdf->setPaper('A4', 'portrait');

        return $pdf->download(
            'Teacher_Report_' .
            $this->safeFileName($user->name) .
            '.pdf'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Generate Admin Report
    |--------------------------------------------------------------------------
    */

    private function generateAdminReport(User $user)
    {
        /*
        |--------------------------------------------------------------------------
        | Platform Statistics
        |--------------------------------------------------------------------------
        */

        $totalStudents = User::where(
            'role',
            'student'
        )->count();


        $totalTeachers = User::where(
            'role',
            'teacher'
        )->count();


        $totalAdmins = User::where(
            'role',
            'admin'
        )->count();


        $totalCourses = Course::count();

        $totalLessons = Lesson::count();

        $totalQuizzes = Quiz::count();


        /*
        |--------------------------------------------------------------------------
        | Generate PDF
        |--------------------------------------------------------------------------
        */

        $pdf = Pdf::loadView(
            'pdf.admin-report',
            compact(
                'user',
                'totalStudents',
                'totalTeachers',
                'totalAdmins',
                'totalCourses',
                'totalLessons',
                'totalQuizzes'
            )
        );

        $pdf->setPaper('A4', 'portrait');

        return $pdf->download(
            'Admin_Report_' .
            $this->safeFileName($user->name) .
            '.pdf'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Safe File Name
    |--------------------------------------------------------------------------
    */

    private function safeFileName($name)
    {
        $name = preg_replace(
            '/[^A-Za-z0-9_-]/',
            '_',
            $name
        );

        return trim(
            $name,
            '_'
        ) ?: 'User';
    }
}
