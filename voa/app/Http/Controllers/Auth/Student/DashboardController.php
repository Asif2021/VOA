<?php

namespace App\Http\Controllers\Auth\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect('/course');
//        return view('auth.student.index');
    }
}
