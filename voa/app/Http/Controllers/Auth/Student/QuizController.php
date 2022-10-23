<?php

namespace App\Http\Controllers\Auth\Student;

use App\AttemptQuiz;
use App\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $quizsubjects = auth()->user()->studentSubjects()->whereHas('quiz')->with('quiz')->get();
            return view('auth.student.quiz.index')->withQuizsubjects($quizsubjects);
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
        //
    }

    public function attempt(Quiz $quiz, Request $request)
    {
//        dd($quiz);
//        dd($quiz->studentAttempt);
        try {
            $result = null;
            if ($request->has('file')) {
                $doc = $request->file;
                $ext = $doc->getClientOriginalExtension();
                if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx') {
                    $name = time() . '.' . $doc->getClientOriginalName();
                    $doc->move(public_path('uploads/quiz/attempt'), $name);
                    $result = 'uploads/quiz/attempt/' . $name;
                } else {
                    return back()->withFlashError('Please select doc or pdf only');
                }
            } else {
                return back()->withFlashError('Please select a file');
            }
            if ($result) {
                $quizattempt = new AttemptQuiz();
                $quizattempt->student_id = auth()->user()->id;
//                dd($quiz->id);
                $quizattempt->quiz_id = $quiz->id;
                $quizattempt->attempt_at = Carbon::now();
                $quizattempt->url = $result;
                if ($quizattempt->save()) {
                    return redirect()->route('student.quiz.index')->withFlashSuccess('Uploaded');
                }
            }
            return redirect()->route('student.quiz.index')->withFlashError('Could not upload');
        } catch (\Exception $exception) {
            return redirect()->route('student.dashboard')->withFlashError('Try again later');
        }
    }
}
