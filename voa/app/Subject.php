<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'title',
            'subject_code',
            'course_id',
            'status',
        ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function subjectTeacher()
    {
        $this->hasMany(User::class);
    }

    public function subjectStudent()
    {
        return $this->belongsToMany(User::class, 'subject_teachers', 'subject_id', 'student_id');
    }

    public function studentSubjectTeacher()
    {
        return $this->belongsToMany(User::class, 'subject_teachers', 'subject_id', 'teacher_id');
    }

    public function helpingMaterials()
    {
        return $this->hasMany(HelpingMaterial::class, 'subject_ref_id', 'id');
    }

    public function lessonProblems()
    {
        return $this->hasMany(LessonProblem::class, 'subject_id', 'id');
    }

    public function quiz()
    {
        return $this->hasMany(Quiz::class);
    }
}
