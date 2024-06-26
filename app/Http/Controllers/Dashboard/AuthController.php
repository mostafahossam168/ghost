<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except('login', 'adminLogin');
        $this->middleware('guest:admin')->except('profile', 'logout');
    }
    public function login()
    {
        return view('dashboard.index');
    }
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => "required|string|email|max:255",
            'password' => "required|string",
            'remember' => "nullable|boolean",
        ]);
        $remember = $request->only('remember') ?? 0;
        if (auth()->attempt($request->only('email', 'password'), $remember)) {
            return redirect()->route('admin.home')->with('success', 'تم تسجيل الدخول بنجاح');
        }
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'البيانات غير صحيحة');
    }


    public function profile()
    {
        $profile = auth('admin')->user();
        return view('dashboard.profile', compact('profile'));
    }


    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}