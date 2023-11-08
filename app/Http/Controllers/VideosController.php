<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

class VideosController extends Controller
{
    //index_videos
    public function index_videos(Request $request)
    {
        $videos =   Videos::where('Is_deleted', 0)->get();
        $data['header_title'] = 'videos |';
        return view('backend_master.videos.index',  $data, ['videos'=>$videos]);
    }
    public function create_videos(Request $request)
    {
        /*   $roles = Role::all();
        $users =   User::where('Is_deleted', 0)->latest()->paginate(5);
        $data['header_title'] = 'User |'; */
        $courses =   Courses::where('Is_deleted', 0)->get();
        $data['header_title'] = 'User |';
        return view('backend_master.videos.create', $data, ['courses'=> $courses]);
    }
    public function store_videos(Request $request)
    {

        DB::beginTransaction();
        try {
            $request->validate([
                'title' => 'required',
                'status' => 'required',
                'description' => 'required',

            ]);

            $videos = new Videos();

            $videos->title = $request->input('title');
            /*         $videos->status = $request->input('status'); */
            $videos->description = $request->input('description');
            $videos->course_name = $request->input('course_name');

            if (!empty($request->file('videos'))) {
                $ext = $request->file('videos')->getClientOriginalExtension();
                $file = $request->file('videos');
                $randomStr = Str::random(20);
                $filename = strtolower($randomStr) . '.' . $ext;
                $file->move('media/', $filename);
                $videos->videos = $filename;
            }

            $videos->save();
            DB::commit();
            return redirect('/panel/dashboard/videos')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            $request->validate([
                'title' => 'required',
                'status' => 'required',
                'description' => 'required',
                'courses_name' => 'required',

            ]);
            return redirect()->back()->with('error', "User added successfully!");
        }

    }
    //
    public function  edit_videos( $id)
    {
        $videos = Videos::findOrFail($id);
        $courses = Courses::where('Is_deleted', 0)->get();
        $data['header_title'] = 'Edit |';
        return view('backend_master.videos.edit', $data, ['courses'=>$courses , 'videos'=>$videos]);
    }

    public function delete_videos(Request $request)
    {
        $videos_id = $request->input('videos');
        $videos_id = Videos::findOrFail($videos_id);
        $videos_id->Is_deleted = 1;
        $videos_id->save();
        return back()->with('success', ' Category is delete successfully!');
    }
}
