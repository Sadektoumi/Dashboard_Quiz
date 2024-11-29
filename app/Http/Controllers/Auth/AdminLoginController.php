<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $admin = Auth::guard('admin')->user();

            // Check the role of the authenticated user
            if ($admin->role === 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            } else {
                return redirect()->route('admin.dashboard');
            }
        }

        // If authentication fails, redirect back to login with an error
        return redirect()->back()->withErrors(['Invalid credentials or unauthorized access']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
