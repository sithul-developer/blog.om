<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    //
    public function index_courses()
    {
            //
            /* $courses = Courses::where('Is_deleted', 0)->get() */;
                $categories = Category::where('Is_deleted', 0)->get();
        $courses = Courses::where('Is_deleted', 0)->get();
        $data['header_title'] = ' Courses |';
        return view('backend_master.courses.index', $data, ['courses' => $courses, 'categories' => $categories]);
    }
    public function create_courses()
    {
        $categories = Category::where('Is_deleted' ,0)->get();
        $data['header_title'] = 'Create User  |';
        return view('backend_master.courses.create',  $data, ['categories' => $categories]);
    }

    // store
    public function  store_courses(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'prices' => 'required',
                'name' => 'required',
            ]);

            $courses = new Courses();

            $courses->title = $request->input('title');
            $courses->description = $request->input('description');
            $courses->prices = $request->input('prices');
            $courses->name = $request->input('name');
            $courses->category_id = $request->input('category_id');



            if (!empty($request->file('image'))) {
                $ext = $request->file('image')->getClientOriginalExtension();
                $file = $request->file('image');
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr) . '.' . $ext;
                $file->move('media/', $filename);
                $courses->image = $filename;
            }

            $courses->save();
            DB::commit();

            return redirect('/panel/dashboard/courses')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            /*      DB::rollback(); */
            /*  return redirect()->back()->with('error', "User added successfully!"); */
            dd($e->getMessage());
        }
    }

    public function edit_courses( $id)
    {
        $categories = Category::all();
        $courses = Courses::find($id);
        $data['header_title'] = 'Edit |';
        return view('backend_master.courses.edit', $data, ['courses'=>$courses , 'categories'=>$categories]);
    }
    public function update_courses(Request $request, $id)
    {
        //update
        DB::beginTransaction();
        try {
            $courses = Courses::findOrFail($id);
            $courses->title = $request->input('title');
            $courses->description = $request->input('description');
            $courses->prices = $request->input('prices');
            $courses->name = $request->input('name');
            $courses->category_id = $request->input('category_id');
            if (!empty($request->file('image'))) {
                $ext = $request->file('image')->getClientOriginalExtension();
                $file = $request->file('image');
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr) . '.' . $ext;
                $file->move('media/', $filename);
                $courses->image = $filename;
            }
            $courses->save();
            DB::commit();
            return redirect('/panel/dashboard/courses')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    public function delete_courses(Request $request)
    {
        $courses_id = $request->input('courses');
        $courses_id = Courses::findOrFail($courses_id);
        $courses_id->Is_deleted = 1;
        $courses_id->save();
        return redirect()->back()->with('success', ' Category is delete successfully!');
    }

    public function disable($courseId)
    {

        $Courses = Courses::find($courseId);
        if ($Courses) {
            if ($Courses->status) {
                $Courses->status = 0;
            } else {
                $Courses->status = 1;
            }
        }
        $Courses->save();
        return back();
    }
}
