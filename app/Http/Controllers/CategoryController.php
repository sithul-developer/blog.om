<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index_course_cate()
    {
        //
        $course_category = Category::where('Is_deleted', 0)->get();
        /* $data['header_title'] = 'Create User |' */
        return view('backend_master.course_cate.index', compact('course_category'));
    }
    public function  create_course_category()
    {
        //
        return view('backend_master.course_cate.create');
    }
    public function store_course_category(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
            $course_cate = new Category();
            $course_cate->name = trim($request->name);
            $course_cate->description = trim($request->description);

            $course_cate->save();
            DB::commit();
            return redirect('/panel/dashboard/course_category')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            $request->validate([
                'name' => 'required',
                'description' => 'required',

            ]);
            return redirect()->back()->with('error', "User added successfully!");
        }
    }
    public function edit_course_category($id)
    {

        $course_category = Category::find($id);
        return view('backend_master.course_cate.edit', compact('course_category'));
    }

    public function update_course_category(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $users = Category::findOrFail($id);
            $users->name = $request->input('name');
            $users->description = $request->input('description');
            $users->save();
            DB::commit();
            return redirect('/panel/dashboard/course_category')->with('success', 'Category update successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
      /*   dd($request->all()); */
    }
     //destroy
     public function delete_course_category(Request $request)
     {

         $Courses_Category_id = $request->input('Courses_Category');
         $Courses_Category_id = Category::find($Courses_Category_id);
         $Courses_Category_id->Is_deleted = 1;
         $Courses_Category_id->save();
         return redirect()->back()->with('success', ' Category is delete successfully!');
     }

     public function view_course_category($id)
     {
         $course_category = Category::find($id);
         $data['header_title'] = 'Edit User |';
         return view('backend_master.course_cate.view', $data, compact('course_category', ));
     }




}
