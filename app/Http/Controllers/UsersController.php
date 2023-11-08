<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('role_or_permission:user view', ['only' => ['create']]);
    }

    // index
    public function index_user(Request $request)
    {
        $roles = Role::all();
        $users =   User::where('Is_deleted', 0)->latest()->paginate(5);
        $data['header_title'] = 'User |';
        return view('backend_master.users.users.index', $data, compact('users', 'roles'));
    }

    // create
    public function create_user(Request $request)
    {
        $roles = Role::all();
        $data['header_title'] = 'Create User |';
        return view('backend_master.users.users.create', $data, compact('roles'));
    }
    // store
    public function store_user(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'email' => 'required|email:rfc,dns|unique:users,email',
                'name' => 'required|unique:users,name',
                'password' => 'required|min:8',
                'user_type' => 'required',

            ]);

            $user = new User();
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->password = Hash::make($request->password);
            $user->syncRoles($request->user_type);
            $user->save();
            DB::commit();
            return redirect('/panel/dashboard/users')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            $request->validate([
                'email' => 'required|email:rfc,dns|unique:users,email',
                'name' => 'required|unique:users,name',
                'password' => 'required|min:8',
                'user_type' => 'required',

            ]);
            return redirect()->back()->with('error', "User added successfully!");
        }
    }
    // Edit
    public function edit_user($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('backend_master.users.users.edit', compact('users', 'roles', 'rolePermissions'));
    }
    // View

    public function view_users($id)
    {
        $users = User::find($id);
        $data['header_title'] = 'Edit User |';
        return view('backend_master.users.users.view', $data, compact('users', ));
    }
    public function update_users(Request $request, $id)
    {
        //update
        DB::beginTransaction();
        try {
            $users = User::findOrFail($id);
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->syncRoles($request->role);
            $users->save();
            DB::commit();
            return redirect('/panel/dashboard/users')->with('success', 'Category update successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    //destroy
    public function destroy_users(Request $request)
    {
        $user_id = $request->input('user');
        $user_id = User::find($user_id);
        $user_id->Is_deleted = 1;
        $user_id->save();
        return redirect()->back()->with('success', ' Category is delete successfully!');
    }


    // this function active and inactive
    public function disable($userId)
    {

        $user = User::find($userId);
        if ($user) {
            if ($user->status) {
                $user->status = 0;
            } else {
                $user->status = 1;
            }
        }
        $user->save();
        return back();
    }
}
