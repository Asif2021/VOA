<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseJoin extends Model
{
    protected $table = 'course_joins';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'course_id',
        'status',
        'end',
    ];


}
