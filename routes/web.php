<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentQuizController;
use App\Http\Controllers\StudentResultController;
use App\Http\Controllers\StudentAttemptController;
use App\Http\Controllers\StudentLessonController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\StudentReportController;
use App\Http\Controllers\TeacherReportController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\ReportPdfController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LessonCommentController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Welcome Page
|--------------------------------------------------------------------------
*/
Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role == 'admin') {
        return redirect()->route('adminDash');
    } elseif ($user->role == 'teacher') {
        return redirect()->route('teacher.dashboard');
    }
    return redirect('/student/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [UserProfileController::class, 'index']
    )->name('profile');
    Route::get('/profile/edit',
    [UserProfileController::class, 'edit']);

Route::put('/profile/update',
    [UserProfileController::class, 'update']);

Route::get('/profile/change-password',
    [UserProfileController::class, 'changePassword']);

Route::put('/profile/update-password',
    [UserProfileController::class, 'updatePassword']);

});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:teacher'])
    ->prefix('teacher')
    ->group(function () {


        Route::get(
    '/dashboard',
    [TeacherDashboardController::class, 'index']
)->name('teacher.dashboard');

        // الكورسات
        Route::get('/courses',
            [CourseController::class, 'index'])
            ->name('teacher.courses.index');

            Route::get('/courses/{course}/edit',
    [CourseController::class, 'edit'])
    ->name('teacher.courses.edit');

Route::put('/courses/{course}',
    [CourseController::class, 'update'])
    ->name('teacher.courses.update');

Route::delete('/courses/{course}',
    [CourseController::class, 'destroy'])
    ->name('teacher.courses.destroy');



        Route::get('/courses/create',
            [CourseController::class, 'create'])
            ->name('teacher.courses.create');

        Route::post('/courses',
            [CourseController::class, 'store'])
            ->name('teacher.courses.store');

        Route::get('/courses/{course}', [CourseController::class, 'show'])
            ->name('teacher.courses.show');

        // الدروس
        Route::get('/courses/{course}/lessons/create',
    [LessonController::class, 'create'])
    ->name('teacher.lessons.create');

Route::post('/courses/{course}/lessons',
    [LessonController::class, 'store'])
    ->name('teacher.lessons.store');

    Route::get('/lessons/{lesson}',
    [LessonController::class, 'show'])
    ->name('teacher.lessons.show');

Route::get('/lessons/{lesson}/edit',
    [LessonController::class, 'edit'])
    ->name('teacher.lessons.edit');

Route::put('/lessons/{lesson}',
    [LessonController::class, 'update'])
    ->name('teacher.lessons.update');

Route::delete('/lessons/{lesson}',
    [LessonController::class, 'destroy'])
    ->name('teacher.lessons.destroy');

        // الكويزات
        Route::get('/courses/{course}/quizzes/create',
            [QuizController::class, 'create']);

        Route::post('/courses/{course}/quizzes',
            [QuizController::class, 'store']);

            // عرض اختبار
Route::get('/quizzes/{quiz}',
    [QuizController::class, 'show'])
    ->name('teacher.quizzes.show');

// تعديل اختبار
Route::get('/quizzes/{quiz}/edit',
    [QuizController::class, 'edit'])
    ->name('teacher.quizzes.edit');

// تحديث اختبار
Route::put('/quizzes/{quiz}',
    [QuizController::class, 'update'])
    ->name('teacher.quizzes.update');

// حذف اختبار
Route::delete('/quizzes/{quiz}',
    [QuizController::class, 'destroy'])
    ->name('teacher.quizzes.destroy');

    // إنشاء سؤال
Route::get(
'/quizzes/{quiz}/questions/create',
[QuestionController::class, 'create']
);

// حفظ السؤال
Route::post(
'/quizzes/{quiz}/questions',
[QuestionController::class, 'store']
);

// تعديل سؤال
Route::get(
'/questions/{question}/edit',
[QuestionController::class, 'edit']
);

// تحديث سؤال
Route::put(
'/questions/{question}',
[QuestionController::class, 'update']
);

// حذف سؤال
Route::delete(
'/questions/{question}',
[QuestionController::class, 'destroy']
);

Route::get(
    '/reports',
    [TeacherReportController::class,'index']
);
Route::get(
    '/teacher/report/pdf',
    [ReportPdfController::class, 'teacher']
)->name('teacher.report.pdf');

});
/*
|--------------------------------------------------------------------------
| Student Quiz Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // عرض الكويز
    Route::get('/quizzes/{quiz}',
        [StudentQuizController::class, 'show']);

    // تسليم الكويز
    Route::post('/quizzes/{quiz}/submit',
        [StudentQuizController::class, 'submit']);

    // النتائج
    Route::get('/student/results',
        [StudentResultController::class, 'index']);

    // المحاولات
    Route::get('/quizzes/{quiz}/attempts',
        [StudentAttemptController::class, 'index']);

    Route::get('/attempts/{attempt}',
        [StudentAttemptController::class, 'show']);

        Route::get(
    '/student/reports',
    [StudentReportController::class,'index']
);
});

/*
|--------------------------------------------------------------------------
| Courses
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // عرض كورس
    Route::get('/courses/{course}',
        [CourseController::class, 'show']);

    // كل الكورسات
Route::get('/courses',
    [EnrollmentController::class, 'index']);

// التسجيل بكورس
Route::post('/courses/{course}/enroll',
    [EnrollmentController::class, 'store']);

// كورساتي
Route::get('/my-courses',
    [EnrollmentController::class, 'myCourses']);
});
/*
|--------------------------------------------------------------------------
| Progress & Lessons
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // عرض درس
    Route::get('/lessons/{lesson}',
        [StudentLessonController::class, 'show']);

    // إكمال درس
    Route::post('/lessons/{lesson}/complete',
        [StudentLessonController::class, 'complete']);

    // تقدم الطالب
    Route::get('/courses/{course}/progress',
        [StudentLessonController::class, 'progress']);
        //شهادة
        Route::get(
    '/certificate/{course}',
    [CertificateController::class, 'download']
)->name('certificate.download');

// بدء حضور الدرس
Route::post(
    '/lessons/{lesson}/attendance/start',
    [StudentLessonController::class, 'startAttendance']
)->name('lessons.attendance.start');


Route::post(
    '/lessons/{lesson}/attendance',
    [AttendanceController::class, 'record']
)->middleware('auth');

Route::get(
    '/teacher/lessons/{lesson}/attendance',
    [AttendanceController::class, 'teacherAttendance']
)->middleware('auth')->name('teacher.attendance');

Route::get(
    '/teacher/courses/{course}/attendance',
    [AttendanceController::class, 'courseAttendance']
)->middleware('auth')->name('teacher.course.attendance');

Route::post('/lessons/{lesson}/comments', [LessonCommentController::class, 'store'])
    ->middleware('auth')
    ->name('lesson.comments.store');

Route::post('/lesson-comments/{comment}/reply', [LessonCommentController::class, 'reply'])
    ->middleware('auth')
    ->name('lesson.comments.reply');

    Route::delete(
    '/lesson-comments/{comment}',
    [LessonCommentController::class, 'destroy']
)->middleware('auth')->name('lesson.comments.destroy');

Route::put(
    '/lesson-comments/{comment}',
    [LessonCommentController::class, 'update']
)->middleware('auth')->name('lesson.comments.update');
});
/*
|--------------------------------------------------------------------------
| Dashbord
|--------------------------------------------------------------------------
*/
// Dashboard الطالب
Route::middleware(['auth'])
->get(
    '/student/dashboard',
    [StudentDashboardController::class,'index']
);




// Dashboard الأدمن
//
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get(
    '/dashboard',
    [AdminDashboardController::class, 'index']
)->name('adminDash');

        // عرض صفحة إنشاء معلم
        Route::get('/teachers/create',
            [AdminTeacherController::class, 'create']);

        // حفظ المعلم
        Route::post('/teachers/store',
            [AdminTeacherController::class, 'store']);

            Route::get('/teachers',
    [AdminTeacherController::class, 'index']);

Route::get('/teachers/{teacher}/edit',
    [AdminTeacherController::class, 'edit']);

Route::put('/teachers/{teacher}',
    [AdminTeacherController::class, 'update']);

Route::delete('/teachers/{teacher}',
    [AdminTeacherController::class, 'destroy']);

    Route::get('/students',
    [AdminStudentController::class, 'index']);

Route::delete('/students/{student}',
    [AdminStudentController::class, 'destroy']);

    Route::get('/courses',
    [AdminCourseController::class, 'index']);

Route::delete('/courses/{course}',
    [AdminCourseController::class, 'destroy']);

    Route::get(
    '/reports',
    [AdminReportController::class,'index']
);
Route::get(
    '/admin/report/pdf',
    [ReportPdfController::class, 'admin']
)->name('admin.report.pdf');
});
Route::get(
    '/reports/users/{user}/pdf',
    [ReportPdfController::class, 'userReport']
)->name('admin.user.report.pdf');
Route::get(
    '/student/report/pdf',
    [ReportPdfController::class, 'student']
)->name('student.report.pdf');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
use Illuminate\Support\Facades\App;

Route::get('/language/{locale}', function ($locale) {

    if (!in_array($locale, ['ar', 'en'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    App::setLocale($locale);

    return redirect()->back();

})->name('language.switch');
