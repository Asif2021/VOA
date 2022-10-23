<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProblemSolution extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'problem_id',
        'teacher_id',
        'solution',
    ];


}
