<?php

namespace App\Http\Controllers\Auth\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect('/teacher/subject');
//        return view('auth.teacher.index');
    }

}
