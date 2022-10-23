<?php

namespace App\Http\Controllers\Auth\Student;

use App\Course;
use App\HelpingMaterial;
use App\LessonProblem;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course, Subject $subject)
    {
        try {
            if ($subject->course->id == $course->id) {
                return view('auth.student.subject.show')->withCourse($course)->withSubject($subject);
            }
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
        } catch (\Exception $exception) {
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function joinedCourseSubject(Course $course, Subject $subject)
    {
        try {
            if ($subject->course->id == $course->id) {
                if (!auth()->user()->studentSubjects->contains('id', $subject->id)){
                    $teachers = User::whereHas('roles', function ($query) {
                        return $query->where('name', 'teacher');
                    })
                        ->whereHas('teacherSubject', function ($query) use ($subject) {
                            return $query->where('id', $subject->id);
                        })->get();
                    $books = null;
                    $lectures = null;
                    $problems = null;
                }else{
                    $teachers = null;
                    $books = HelpingMaterial::where('subject_ref_id', $subject->id)
                        ->where('teacher_ref_id', $subject->studentSubjectTeacher()->first()->id)
                        ->where('type', 'doc')
                        ->get();
                    $lectures = HelpingMaterial::where('subject_ref_id', $subject->id)
                        ->where('teacher_ref_id', $subject->studentSubjectTeacher()->first()->id)
                        ->where('type', 'audio')
                        ->get();
                    $problems = LessonProblem::where('subject_id', $subject->id)
                        ->where('teacher_id', $subject->studentSubjectTeacher()->first()->id)
                        ->get();
                }
                return view('auth.student.subject.joined-course-subjects')
                    ->withCourse($course)
                    ->withSubject($subject)
                    ->withTeachers($teachers)
                    ->withBooks($books)
                    ->withLectures($lectures)
                    ->withProblems($problems);
            }
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
        } catch (\Exception $exception) {
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
        }
    }

    public function selectSubjectTeacher(Course $course, Subject $subject, Request $request)
    {
        try {
            if ($subject->course->id == $course->id) {
                if ($request->teacher){
                    auth()->user()->studentSubjects()->attach($subject->id, ['teacher_id' => $request->teacher]);
                    return back()->withFlashError('Please Select Teacher')->withFlashSuccess('Successfully Selected');
                }
                return back()->withFlashError('Please Select Teacher')->withErrors(['teacher' => 'Please Select Teacher']);
            }
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
        } catch (\Exception $exception) {
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
        }
    }
}
