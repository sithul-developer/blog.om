<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function create(Request $request)
    {
        $users = User::all();
        return view('backend_master.users.users.users' ,compact('users'));
    }
    public function store(Request $request )
    {
       /*  dd($request->all()); */
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
        $user->user_type = trim($request->user_type);
        $user->save();
        return redirect('/panel/dashboard/user')->with('success', "User added successfully!");
    }

    //destroy
    public function destroy($id)
    {
      User::find($id)->delete();
      return redirect('/panel/dashboard/user')->with('success', "User added successfully!");
    }


}
