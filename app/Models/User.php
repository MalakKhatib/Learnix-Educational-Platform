<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Course;
use App\Models\LessonComment;
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
////////
// كورسات المدرس
public function courses()
{
    return $this->hasMany(Course::class, 'teacher_id');
}

// تسجيلات الطالب
public function enrolledCourses()
{
    return $this->belongsToMany(
        \App\Models\Course::class,
        'enrollments'
    );
}

// محاولات الاختبارات
public function attempts()
{
    return $this->hasMany(QuizAttempt::class);
}

public function lessonComments()
{
    return $this->hasMany(LessonComment::class);
}

// التقدم
public function progress()
{
    return $this->hasMany(Progress::class);
}

// الحضور
public function attendance()
{
    return $this->hasMany(Attendance::class);
}
/////////

public function completedLessons()
{
    return $this->belongsToMany(
        Lesson::class,
        'progress'
    )->withPivot(
        'completed',
        'completed_at'
    );
}


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
    'name',
    'email',
    'password',
    'role',
    'phone',
    'address',
    'university_id',
    'profile_image',
];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

}
