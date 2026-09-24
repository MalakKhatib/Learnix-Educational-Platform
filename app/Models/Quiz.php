<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    //
    protected $fillable = [
    'title',
    'course_id',
];
    // الكورس
public function course()
{
    return $this->belongsTo(Course::class);
}

// الأسئلة
public function questions()
{
    return $this->hasMany(Question::class);
}

// محاولات الاختبار
public function attempts()
{
    return $this->hasMany(QuizAttempt::class);
}
}
