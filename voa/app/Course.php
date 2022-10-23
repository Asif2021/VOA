<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'course_code',
        'description',
        'status',
    ];

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_joins', 'course_id', 'student_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
