<?php

namespace App\Http\Controllers\AUth\Teacher;

use App\Http\Requests\Auth\Teacher\StoreProblemRequest;
use App\LessonProblem;
use App\ProblemSolution;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $problems = auth()->user()->teacherSubject->lessonProblems->where('teacher_id', auth()->user()->id);
            return view('auth.teacher.problem.index')->withProblems($problems);
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
        try {
            return view('auth.teacher.problem.create');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProblemRequest $request)
    {
        try {
            $result = null;
            if ($request->has('file')) {
                $doc = $request->file;
                $ext = $doc->getClientOriginalExtension();
                if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx') {
                    $name = time() . '.' . $doc->getClientOriginalName();
                    $doc->move(public_path('uploads/problem'), $name);
                    $result = 'uploads/problem/' . $name;
                } else {
                    return back()->withErrors(['file' => 'Please select doc or pdf only'])->withInput();
                }
            } else {
                return back()->withErrors(['file' => 'Please select a file'])->withInput();
            }
            if ($result) {
                $material = new LessonProblem();
                $material->subject_id = auth()->user()->teacherSubject->id;
                $material->teacher_id = auth()->user()->id;
                $material->title = $request->title;
                $material->url = $result;
                if ($material->save()) {
                    return redirect()->route('teacher.problem.index')->withFlashSuccess('Uploaded');
                }
            }
            return redirect()->route('teacher.problem.index')->withFlashError('Could not upload');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        try {
            $problem = LessonProblem::findorfail($id);
            if ($problem->delete()) {
                return back()->withFlashSuccess('Deleted');
            }
            return back()->withFlashError('Could not delete');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    public function updatesolution($id, Request $request)
    {
        try {
            $problem = LessonProblem::findorfail($id);
            $result = null;
            if ($request->has('file')) {
                $doc = $request->file;
                $ext = $doc->getClientOriginalExtension();
                if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx') {
                    $name = time() . '.' . $doc->getClientOriginalName();
                    $doc->move(public_path('uploads/problem/solution'), $name);
                    $result = 'uploads/problem/solution/' . $name;
                } else {
                    return back()->withFlashError('Please select doc or pdf only');
                }
            } else {
                return back()->withFlashError('Please select a file');
            }
            if ($result) {
                if ($problem->solution){
                    $solution = $problem->solution;
                }else{
                    $solution = new ProblemSolution();
                    $solution->problem_id = $problem->id;
                    $solution->teacher_id = auth()->user()->id;
                }
                $solution->url = $result;
                if ($solution->save()) {
                    return redirect()->route('teacher.problem.index')->withFlashSuccess('Uploaded');
                }
            }
            return redirect()->route('teacher.problem.index')->withFlashError('Could not upload');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }
}
