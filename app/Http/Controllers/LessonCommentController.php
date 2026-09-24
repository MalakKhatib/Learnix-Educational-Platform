<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonComment;
use Illuminate\Http\Request;

class LessonCommentController extends Controller
{
    /**
     * إضافة تعليق من الطالب
     */
    public function store(Request $request, Lesson $lesson)
    {
        $user = auth()->user();

        // التأكد أن المستخدم طالب
        if ($user->role !== 'student') {
            abort(403);
        }

        // التأكد أن الطالب مسجل في المقرر
        $isEnrolled = $lesson->course
            ->students()
            ->where('users.id', $user->id)
            ->exists();

        if (!$isEnrolled) {
            abort(403, 'يجب أن تكون مسجلاً في المقرر لإضافة تعليق.');
        }

        $request->validate([
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        LessonComment::create([
            'lesson_id' => $lesson->id,
            'user_id' => $user->id,
            'parent_id' => null,
            'comment' => $request->comment,
        ]);

        return back()->with(
            'comment_success',
            'تم إضافة تعليقك بنجاح.'
        );
    }


    /**
     * إضافة رد من المعلم
     */
    public function reply(Request $request, LessonComment $comment)
    {
        $user = auth()->user();

        // التأكد أن المستخدم معلم
        if ($user->role !== 'teacher') {
            abort(403);
        }

        // تحميل الدرس والمقرر
        $comment->load('lesson.course');

        $lesson = $comment->lesson;
        $course = $lesson->course;

        // التأكد أن هذا المعلم هو معلم المقرر
        if ($course->teacher_id !== $user->id) {
            abort(403);
        }

        $request->validate([
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        LessonComment::create([
            'lesson_id' => $comment->lesson_id,
            'user_id' => $user->id,
            'parent_id' => $comment->id,
            'comment' => $request->comment,
        ]);

        return back()->with(
            'comment_success',
            'تم إضافة الرد بنجاح.'
        );
    }


    /**
     * تعديل التعليق أو الرد
     * يسمح للمستخدم بتعديل ما كتبه هو فقط
     */
    public function update(Request $request, LessonComment $comment)
    {
        $user = auth()->user();

        // لا يمكن تعديل تعليق شخص آخر
        if ($comment->user_id !== $user->id) {
            abort(403);
        }

        $request->validate([
            'comment' => ['required', 'string', 'max:2000'],
        ]);

        $comment->update([
            'comment' => $request->comment,
        ]);

        return back()->with(
            'comment_success',
            'تم تعديل التعليق بنجاح.'
        );
    }


    /**
     * حذف التعليق أو الرد
     * يسمح للمستخدم بحذف ما كتبه هو فقط
     */
    public function destroy(LessonComment $comment)
    {
        $user = auth()->user();

        // لا يمكن حذف تعليق شخص آخر
        if ($comment->user_id !== $user->id) {
            abort(403);
        }

        $comment->delete();

        return back()->with(
            'comment_success',
            'تم حذف التعليق بنجاح.'
        );
    }
}
