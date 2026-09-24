<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LessonComment;
class Lesson extends Model
{
    protected $fillable = [
        'title',
        'content',
        'video_path',
        'course_id',
    ];

    // الكورس الذي ينتمي إليه الدرس
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // التقدم على الدرس
    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    // الطلاب الذين أكملوا الدرس
    public function completedBy()
    {
        return $this->belongsToMany(
            User::class,
            'progress'
        )->withPivot(
            'completed',
            'completed_at'
        );
    }

    // الحضور
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
    //تعليقات
    public function comments()
{
    return $this->hasMany(LessonComment::class);
}
}
