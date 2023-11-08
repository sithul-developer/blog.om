<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role view', ['only' => ['store_role']]);
    }

    /// ================= Permission =================

    public function index_permission()
    {
        return view('backend_master.permission.index');
    }
    public function store_permission(Request $request)
    {

        $permission = new Permission();
        $permission->name = $request->permission;
        $permission->save();
        return back()->with('success ', 'permission has be create successfully ');
    }

    //================= Role =================
    public function index_role()
    {
        $permissions = Permission::all();
        $roles =   Role::where('Is_deleted', 0)->latest()->paginate(5);
        $data['header_title'] = 'Role |';
        return view('backend_master.users.role.index', $data, compact('roles', 'permissions'));
    }

    //==================== Create ====================

    public function create_role()
    {
        $permissions = Permission::all();
        return view('backend_master.users.role.create', ['permissions' => $permissions ,]);
    }
    //==================== Store ====================
    public function store_role(Request $request)
    {
        DB::beginTransaction();
        try {

            $this->validate($request, [
                'role' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);

            $role = new Role();
            $role->name = $request->role;
            $role->syncPermissions($request->permission);

            $role->save();
            DB::commit();
            return redirect('/panel/dashboard/role/index')->with('success', "User added successfully!");
        } catch (\Exception $th) {
            $this->validate($request, [
                'role' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);
            return redirect()->back()->with('error', 'permission has be create successfully ');
        }
    }
    //==================== Edit ====================
    public function edit_role($id)
    {
        $roles = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('backend_master.users.role.edit', compact('roles', 'permission', 'rolePermissions'));
    }
    //==================== Update ====================
    public function update_role(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $role = Role::findOrFail($id);
            $role->name = $request->role;
            $role->syncPermissions($request->permission);

            $role->save();
            DB::commit();
            return redirect('/panel/dashboard/role')->with('success', "User added successfully!");
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
    //==================== Edit ====================
    public function view_role($id)
    {
        $roles = Role::find($id);
        $permissions = Permission::find($id);
        $data['header_title'] = 'Edit User |';
        return view('backend_master.users.role.view', $data, compact('permissions' ,'roles'));
    }
    //==================== Destroy ====================
    public function  destroy_roles(Request $request)
    {
       /*  dd($request->all()); */
        $role_id = $request->input('role');
        $role_id = Role::findOrFail($role_id);
        $role_id-> Is_deleted = 1;
        $role_id->save();
        return redirect()->back()->with('success', ' Category is delete successfully!');
    }
}
