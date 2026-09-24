<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    //
protected $fillable = [
    'attempt_id',
    'question_id',
    'answer_id',
    'is_correct',
];
    


    // المحاولة
public function attempt()
{
    return $this->belongsTo(QuizAttempt::class, 'attempt_id');
}

// السؤال
public function question()
{
    return $this->belongsTo(Question::class);
}

// الجواب المختار
public function answer()
{
    return $this->belongsTo(Answer::class);
}
}
