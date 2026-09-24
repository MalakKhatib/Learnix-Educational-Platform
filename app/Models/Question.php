<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['question_text', 'quiz_id'];

    // الاختبار
public function quiz()
{
    return $this->belongsTo(Quiz::class);
}

// الإجابات (الخيارات)
public function answers()
{
    return $this->hasMany(Answer::class);
}

// إجابات الطلاب
public function userAnswers()
{
    return $this->hasMany(UserAnswer::class);
}
}
