<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        return view('customers.customer-register');
    }
    public function store(Request $request){


        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'dob'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'password'=>'required'
        ]);

        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->address = $request->input('address');
        $customer->mobile = $request->input('mobile');
        $customer->password = Hash::make($request->input('password'));
        $customer->save();

        return view('customers.home');
    }
    public function home()
    {
        return view('customers.home');
    }
    public function profile()
    {
        $customer = Customer::find(Auth::guard('customer')->id());
        return view('customers.profile_page',['customer'=>$customer]);
    }
    public function update(Request $request)
    {
        $customer = Customer::find(Auth::guard('customer')->id());
        $mobile = $request->input('mobile');
        $customer->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$mobile,
            'address'=>$request->input('address'),
            'dob'=>$request->input('dob'),
            'password'=>Hash::make($request->input('password'))
        ]);
       return redirect()->route('customer.profile');
    }
    public function delete(){
        $customer = Customer::find(Auth::guard('customer')->id());
        $customer->delete();
        return redirect()->route('customer.register');
    }
}
