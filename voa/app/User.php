<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name',
            'email',
            'password',
            'username',
            'phone',
            'gender',
            'address',
            'image',
            'status',
            'subject',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'password',
            'remember_token',
        ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function isAdmin()
    {
        return $this->roles->first()->name == 'admin' ? true : false;
    }

    public function isTeacher()
    {
        return $this->roles->first()->name == 'teacher' ? true : false;
    }

    public function isStudent()
    {
        return $this->roles->first()->name == 'student' ? true : false;
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_joins', 'student_id', 'course_id')
            ->withTimestamps();
    }

    public function teacherSubject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function studentSubjects()
    {
        return $this->belongsToMany(Subject::class, 'subject_teachers', 'student_id', 'subject_id')
            ->withTimestamps();
    }

    public function teacherQuiz()
    {
        return $this->hasMany(Quiz::class, 'teacher_id', 'id');
    }

    public function attempts()
    {
        return $this->belongsTo(AttemptQuiz::class, 'student_id', 'id');
    }
}
