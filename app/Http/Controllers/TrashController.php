<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Courses;
use App\Models\Videos;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    //

    public function index_trash()
    {
        $category = Category::where('Is_deleted', 1)->get();
        $courses = Courses::where('Is_deleted', 1)->get();
        $videos = Videos::where('Is_deleted', 1)->get();
        $data['header_title'] = 'Trash |';
        return view("backend_master.trash.index", $data, ["category" => $category ,"courses" => $courses , "videos" => $videos ]);
    }

    //
    public function destroy(Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->delete();
        // redirect to route
        return redirect()->back()->with("success"," dfd");
    }
    //
    public function destroy_course( $id) {
        $course = Category::findOrFail($id);
        $course->delete();
        // redirect to route
        return redirect()->back()->with("success"," dfd");
    }

}
