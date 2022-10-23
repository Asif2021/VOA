<?php

namespace App\Http\Controllers\Auth\Teacher;

use App\AttemptQuiz;
use App\Http\Requests\Auth\Teacher\StoreQuizRequest;
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
            $quizes = auth()->user()->teacherQuiz;
            return view('auth.teacher.quiz.index')->withQuizes($quizes);
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
            return view('auth.teacher.quiz.create');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizRequest $request)
    {
        try {
            $result = null;
            if ($request->has('file')) {
                $doc = $request->file;
                $ext = $doc->getClientOriginalExtension();
                if ($ext == 'pdf' || $ext == 'doc' || $ext == 'docx') {
                    $name = time() . '.' . $doc->getClientOriginalName();
                    $doc->move(public_path('uploads/quiz'), $name);
                    $result = 'uploads/quiz/' . $name;
                } else {
                    return back()->withErrors(['file' => 'Please select doc or pdf only'])->withInput();
                }
            } else {
                return back()->withErrors(['file' => 'Please select a file'])->withInput();
            }
            if ($result) {
                $quiz = new Quiz();
                $quiz->subject_id = auth()->user()->teacherSubject->id;
                $quiz->teacher_id = auth()->user()->id;
                $quiz->title = $request->title;
                $quiz->marks = $request->marks;
                $quiz->expires_at = Carbon::parse($request->expire)->endOfDay();
                $quiz->url = $result;
                if ($quiz->save()) {
                    return redirect()->route('teacher.quiz.index')->withFlashSuccess('Uploaded');
                }
            }
            return redirect()->route('teacher.quiz.index')->withFlashError('Could not upload');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        try {
            $attempts = $quiz->attempts;
            return view('auth.teacher.quiz.attempts')->withQuiz($quiz)->withAttempts($attempts);
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
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
    public function destroy(Quiz $quiz)
    {
        try {
            if ($quiz->delete()) {
                return back()->withFlashSuccess('Deleted');
            }
            return back()->withFlashError('Could not delete');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }
    }

    public function attemptMarks($id, Request $request)
    {
        try {
            $attemptQuiz = AttemptQuiz::findorfail($id);
            $attemptQuiz->obtained = $request->marks;
            if ($attemptQuiz->save()) {
                return back()->withFlashSuccess('Updated');
            }
            return back()->withFlashError('Could not update');
        } catch (\Exception $exception) {
            return redirect()->route('teacher.dashboard')->withFlashError('Try again later');
        }

    }
}
