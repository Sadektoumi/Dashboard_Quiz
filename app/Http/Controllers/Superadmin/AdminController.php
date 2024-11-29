<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageAdmins()
    {
        $admins = Admin::where('role', 'admin')->get();
        return view('admin.manage-admins', compact('admins'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ]);

        Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'permissions' =>json_encode([]),
        ]);

        return redirect()->route('admin.manage.admins')->with('success', 'Admin created successfully');
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit-admin', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $admin->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.manage.admins')->with('success', 'Admin updated successfully');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.manage.admins')->with('success', 'Admin deleted successfully');
    }
}
