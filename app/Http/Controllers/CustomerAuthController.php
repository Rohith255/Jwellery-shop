<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    public function login()
    {
        return view('customers.customer-login');
    }

    public function store(LoginRequest $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);

        if (Auth::guard('customer')->attempt($request->only(['email','password']))){
            return redirect()->route('customer.home');
        }
        return redirect()->route('customer.login')->with('error','Invalid credentials');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
}
