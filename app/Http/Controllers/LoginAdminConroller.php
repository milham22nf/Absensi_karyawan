<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminConroller extends Controller
{
    public function __construct()
    {
        $this->middleware('Guest:admin', ['except' => 'logout']);
    }
    public function formlogin()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'  => 'required|email|exits:admins',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt($credentials, $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended(config('admin.prefix'));
        }

        return back()->withErrors([
            'email' => 'the provided credentials do not match our record',
        ]);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
