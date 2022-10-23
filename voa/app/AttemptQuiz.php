<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttemptQuiz extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'quiz_id',
            'url',
            'student_id',
            'attempt_at',
            'obtained',
        ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
