<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = ['answer_text', 'is_correct', 'question_id'];
    // السؤال
public function question()
{
    return $this->belongsTo(Question::class);
}

// إجابات الطلاب اللي اختاروا هذا الخيار
public function userAnswers()
{
    return $this->hasMany(UserAnswer::class);
}
}
