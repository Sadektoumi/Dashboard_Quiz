<?php

namespace App\Http\Controllers\superadmin;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin.manage-users',compact('users'));
    }





    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        User::updateOrCreate(
            ['id' => $request->id],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );

        return redirect()->route('admin.manage.users')->with('success', 'user created successfully');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.manage.users')->with('success', 'user deleted successfully');
    }
}
