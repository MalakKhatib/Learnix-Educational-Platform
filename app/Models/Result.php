<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    //
    protected $fillable = ['user_id', 'quiz_id', 'score', 'best_score', 'last_attempt_id'];
    // الطالبv
public function user()
{
    return $this->belongsTo(User::class);
}

// الاختبار
public function quiz()
{
    return $this->belongsTo(Quiz::class);
}

// المحاولة المرتبطة
public function attempt()
{
    return $this->belongsTo(QuizAttempt::class, 'last_attempt_id');
}
}
