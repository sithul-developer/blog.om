<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
        return view("backend_master.trash.index", $data, ["category" => $category, "courses" => $courses, "videos" => $videos]);
    }

    //
    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        // redirect to route
        return redirect()->back()->with("success", " dfd");
    }
    //
    public function destroy_course($id)
    {
       /*  $course = Courses::find($id);

        $path = $course->getImage();

        if (Storage::exists($path)) {
            Storage::delete($path);

        }
        $course->delete(); */
        $course = Courses::find($id);

        if(file_exists(public_path('storage//media/'.$course->image))){
            unlink(public_path('storage//media/'.$course->image));
          }else{
            dd('File does not exists.');
          }
          $course->delete();
        // redirect to route
        return redirect()->back()->with("success", " dfd");
    }
    public function destroy_video($id)
    {
        $video = Videos::findOrFail($id);
        $video->delete();
        // redirect to route
        return redirect()->back()->with("success", " dfd");
    }
}
