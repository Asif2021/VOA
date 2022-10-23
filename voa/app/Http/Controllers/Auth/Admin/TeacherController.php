<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Requests\Auth\Admin\StoreTeacherRequest;
use App\Role;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $teachers = User::whereHas('roles', function ($query) {
                return $query->where('name', 'teacher');
            })->get();
            return view('auth.admin.teacher.index')->withTeachers($teachers);

        } catch (\Exception $exception) {
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('auth.admin.teacher.create')->withSubjects($subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        try {
            $teacher = new User();
            $teacher->name = $request->name;
            $teacher->email = $request->email;
            $teacher->username = $request->username;
            $teacher->subject_id = $request->subject;
            $teacher->password = bcrypt($request->password);
            $teacher->status = true;
            if ($teacher->save()){
                $role = Role::where('name', 'teacher')->first();
                $teacher->roles()->attach($role);
            }
            return redirect()->route('admin.teacher.index')->withFlashSuccess('Teacher added successfully.');

        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->route('admin.dashboard')->withFlashError('Error adding teacher');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        try {
            User::findorfail($id)->delete();
            return back()->withFlashSuccess('Successfully deleted.');

        } catch (\Exception $exception) {
            return redirect()->route('admin.dashboard')->withFlashError('Error deleting teacher');
        }
    }
}
