<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(){
        return view('admin.admin-login');
    }

    public function store(LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt($request->only(['email','password']))){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login')->with('error','Invalid credentials');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
