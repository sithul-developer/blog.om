<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class HomeMasterController extends Controller
{
    //
    public function home_master(Request $request)
    {
        $home_masters = Courses::where("Is_deleted" ,0)->get();
        return view('home_master.home' , compact('home_masters'));
    }
}
