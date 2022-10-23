<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Course;
use App\Http\Requests\Auth\Admin\StoreSubjectRequest;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        try {
            $subjects = $course->subjects;
            return view('auth.admin.subject.index')->withCourse($course)->withSubjects($subjects);

        } catch (\Exception $exception) {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        return view('auth.admin.subject.create')->withCourse($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Course $course, StoreSubjectRequest $request)
    {
        try {
            $course->subjects()->create([
                'title' => $request->title,
                'subject_code' => $request->subject_code,
                'description' => $request->description
            ]);
            return redirect()->route('admin.course.subject.index', $course->id)
                ->withFlashSuccess('Course added successfully.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.course.index')->withFlashError('Error adding subject');
        }

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course, Subject $subject)
    {
        return view('auth.admin.subject.edit')->withCourse($course)->withSubject($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Course $course, Subject $subject, Request $request)
    {
        try {
            if ($course->id == $subject->course_id) {
                $subject->title = $request->title;
                $subject->description = $request->description;
                $subject->save();
                return redirect()->route('admin.course.subject.index', $course->id)
                    ->withFlashSuccess('Subject updated successfully.');
            }
            return back()->withFlashError('Error updating.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.course.index')->withFlashError('Error updating subject');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course, Subject $subject)
    {
        try {
            if ($course->id == $subject->course_id) {
                $subject->delete();
                return back()->withFlashSuccess('Successfully deleted.');
            }
            return redirect()->route('admin.course.index')->withFlashError('Could not delete subject');

        } catch (\Exception $exception) {
            return redirect()->route('admin.course.index')->withFlashError('Error deleting subject');
        }
    }

    public function mark(Course $course, Subject $subject)
    {
        try {
            if ($course->id == $subject->course_id) {
                if ($subject->status) {
                    $subject->status = false;
                } else {
                    $subject->status = true;
                }
                $subject->save();
                return back()->withFlashSuccess('Successfully updated.');
            }
            return back()->withFlashError('Error updating.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.course.index')->withFlashError('Error updating');
        }
    }
}
