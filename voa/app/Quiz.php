<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'teacher_id',
        'subject_id',
        'marks',
        'expires_at',
    ];

    public function studentAttempt()
    {
        return $this->hasMany(AttemptQuiz::class)
            ->where('student_id', auth()->user()->id);
    }

    public function attempts()
    {
        return $this->hasMany(AttemptQuiz::class);
    }

}
