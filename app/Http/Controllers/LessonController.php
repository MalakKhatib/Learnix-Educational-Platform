<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Lesson;
use App\Models\Course;


class LessonController extends Controller
{
    // عرض الدرس للمعلم
public function show(Lesson $lesson)
{
    if (
        $lesson->course->teacher_id
        != auth()->id()
    ) {
        abort(403);
    }

    $comments = \App\Models\LessonComment::with([
        'user',
        'replies.user',
    ])
        ->where('lesson_id', $lesson->id)
        ->whereNull('parent_id')
        ->latest()
        ->get();

    return view(
        'teacher.lessons.show',
        compact('lesson', 'comments')
    );
}

    // صفحة تعديل الدرس
    public function edit(Lesson $lesson)
    {
        if (
            $lesson->course->teacher_id
            != auth()->id()
        ) {
            abort(403);
        }

        return view(
            'teacher.lessons.edit',
            compact('lesson')
        );
    }


    // تعديل الدرس
    public function update(
        Request $request,
        Lesson $lesson
    ) {
        if (
            $lesson->course->teacher_id
            != auth()->id()
        ) {
            abort(403);
        }


        $request->validate([

            'title' => 'required|max:255',

            'content' => 'nullable',

            'video' =>
                'nullable|file|mimes:mp4,mov,avi,webm,mkv|max:1048576',

        ]);


        $videoPath = $lesson->video_path;


        // إذا تم اختيار فيديو جديد
        if ($request->hasFile('video')) {

            // حذف الفيديو القديم
            if ($lesson->video_path) {

                Storage::disk('public')
                    ->delete($lesson->video_path);

            }


            // رفع الفيديو الجديد
            $videoPath = $request
                ->file('video')
                ->store('videos', 'public');
        }


        $lesson->update([

            'title' => $request->title,

            'content' => $request->content,

            'video_path' => $videoPath,

        ]);


        return redirect()
            ->route(
                'teacher.courses.show',
                $lesson->course_id
            )
            ->with(
                'success',
                'تم تعديل الدرس بنجاح'
            );
    }


    // حذف الدرس
    public function destroy(Lesson $lesson)
    {
        if (
            $lesson->course->teacher_id
            != auth()->id()
        ) {
            abort(403);
        }


        $courseId = $lesson->course_id;


        // حذف فيديو الدرس من التخزين
        if ($lesson->video_path) {

            Storage::disk('public')
                ->delete($lesson->video_path);

        }


        $lesson->delete();


        return redirect()
            ->route(
                'teacher.courses.show',
                $courseId
            )
            ->with(
                'success',
                'تم حذف الدرس'
            );
    }


    // صفحة إنشاء درس
    public function create(Course $course)
    {
        if (
            $course->teacher_id
            != auth()->id()
        ) {
            abort(403);
        }


        return view(
            'teacher.lessons.create',
            compact('course')
        );
    }


    // إنشاء درس
    public function store(
        Request $request,
        Course $course
    ) {
        if (
            $course->teacher_id
            != auth()->id()
        ) {
            abort(403);
        }


        $request->validate([

            'title' => 'required|max:255',

            'content' => 'nullable',

            'video' =>
                'nullable|file|mimes:mp4,mov,avi,webm,mkv|max:102400',

        ]);


        $videoPath = null;


        // رفع الفيديو
        if ($request->hasFile('video')) {

            $videoPath = $request
                ->file('video')
                ->store('videos', 'public');

        }


        Lesson::create([

            'course_id' => $course->id,

            'title' => $request->title,

            'content' => $request->content,

            'video_path' => $videoPath,

        ]);


        return redirect()
            ->route(
                'teacher.courses.show',
                $course->id
            )
            ->with(
                'success',
                'تم إضافة الدرس بنجاح'
            );
    }
}
