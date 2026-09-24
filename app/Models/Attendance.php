<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'user_id',
        'lesson_id',
        'date',
        'started_at',
        'total_minutes',
        'status',
    ];


    // الطالب
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // الدرس
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
