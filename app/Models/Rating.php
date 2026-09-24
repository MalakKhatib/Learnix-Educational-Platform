<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [

        'user_id',
        'course_id',
        'rating',
        'comment',

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