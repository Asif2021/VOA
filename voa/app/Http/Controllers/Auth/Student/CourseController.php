<?php

namespace App\Http\Controllers\Auth\Student;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $courses = Course::all();
            return view('auth.student.course.index')->withCourses($courses);

        } catch (\Exception $exception) {
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
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
    public function show(Course $course)
    {
        return view('auth.student.course.show')->withCourse($course);
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

    public function enroll(Course $course)
    {
        try {
            if (!auth()->user()->courses->contains('id', $course->id)) {
                auth()->user()->courses()->attach($course);
                return redirect(route('student.course.show', $course->id))->withFlashSuccess('Successfully enrolled');
            } else {
                return redirect()->route('student.course.show', $course->id)->withFlashError('Already enrolled');
            }

        } catch (\Exception $exception) {
            return redirect()->route('student.course.index')->withFlashError('Try again later');
        }
    }

    public function joinedCourses()
    {
        try {
            $courses = auth()->user()->courses;
            return view('auth.student.course.joined-course')->withCourses($courses);

        } catch (\Exception $exception) {
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
        }
    }

    public function showJoinedCourse(Course $course)
    {
        if (auth()->user()->courses->contains('id', $course->id)){
            return view('auth.student.course.joined-course-show')->withCourse($course);
        }
        return redirect()->route('student.course.joined');
    }

}
