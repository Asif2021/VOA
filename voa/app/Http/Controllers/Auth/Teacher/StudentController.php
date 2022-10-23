<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $students = auth()->user()->teacherSubject->subjectStudent;
            return view('auth.teacher.student.index')->withStudents($students);
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $quizes = auth()->user()->teacherSubject->quiz()->with(['attempts' => function($query) use ($id){
                return $query->where('student_id', $id);
            }])->get();
//            dd($quizes);
            $user = User::findorfail($id);
            return view('auth.teacher.student.show')->withStudent($user)->withQuizes($quizes);
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
