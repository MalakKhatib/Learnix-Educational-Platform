<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    //
    protected $fillable = [
    'user_id',
    'course_id',
];
    // الطالب
public function user()
{
    return $this->belongsTo(User::class);
}

// الكورس
public function course()
{
    return $this->belongsTo(Course::class);
}
}
