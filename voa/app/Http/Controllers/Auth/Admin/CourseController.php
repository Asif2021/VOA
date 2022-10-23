<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Course;
use App\Http\Requests\Auth\Admin\StoreCourseRequest;
use App\Http\Requests\Auth\Admin\UpdateCourseRequest;
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
            return view('auth.admin.course.index')->withCourses($courses);

        } catch (\Exception $exception) {
            return redirect()->route('admin.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        try {
            $course = new Course();
            $course->title = $request->title;
            $course->course_code = $request->course_code;
            $course->description = $request->description;
            $course->status = true;
            $course->save();
            return redirect()->route('admin.course.index')->withFlashSuccess('Course added successfully.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.course.index')->withFlashError('Error adding course');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('auth.admin.course.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('auth.admin.course.edit')->withCourse($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Course $course, UpdateCourseRequest $request)
    {
        try {
            $course->title = $request->title;
            $course->description = $request->description;
            $course->status = true;
            $course->save();
            return redirect()->route('admin.course.index')->withFlashSuccess('Course updated successfully.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.course.index')->withFlashError('Error updating course');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $course = Course::findorfail($id);
            $course->subjects()->delete();
            $course->delete();
            return back()->withFlashSuccess('Successfully deleted.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.course.index')->withFlashError('Error deleting course');
        }
    }

    public function mark(Course $course)
    {
        try {
            if ($course->status){
                $course->status = false;
            }else{
                $course->status = true;
            }
            $course->save();
            return back()->withFlashSuccess('Successfully updated.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.course.index')->withFlashError('Error updating');
        }
    }
}
