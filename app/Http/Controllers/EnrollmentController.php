<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //
    public function index_Enrollment(){
        return view('backend_master.enrollments.index' /* , compact('home_masters') */);

    }
}
