<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'teacher_id',
        'subject_id',
        'status',
    ];

}
