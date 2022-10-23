<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isStudent()) {
            return redirect(url('/course'));
        } elseif (auth()->user()->isTeacher()) {
            return redirect(url('teacher/subject'));
        } elseif (auth()->user()->isAdmin()) {
            return redirect(url('admin/student'));
        }
    }
}
