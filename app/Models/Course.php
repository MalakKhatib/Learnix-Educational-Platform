<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Course extends Model
{
    //
    protected $fillable = [
    'title',
    'description',
    'image',
    'teacher_id',
    'category_id',
];
    // المدرس تبع الكورس
public function teacher()
{
    return $this->belongsTo(User::class, 'teacher_id');
}

// الدروس
public function lessons()
{
    return $this->hasMany(Lesson::class);
}

// الاختبارات
public function quizzes()
{
    return $this->hasMany(Quiz::class);
}
public function students()
{
    return $this->belongsToMany(
        User::class,
        'enrollments',
        'course_id',
        'user_id'
    );
}
// الطلاب المسجلين (عبر enrollments)
public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}
public function category()
{
    return $this->belongsTo(Category::class);
}
}
