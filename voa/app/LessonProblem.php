<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonProblem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'subject_id',
        'title',
        'url',
    ];

    public function solution()
    {
        return $this->hasOne(ProblemSolution::class, 'problem_id', 'id');
    }
}
