<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index(){
        return view('customers.customer-register');
    }
    public function store(Request $request){


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

    public function category()
    {
        return view('customers.category_page');
    }

    public function products($id)
    {
        $products = Product::where('category_id',$id)->get();

        return view('customers.product_page',['products'=>$products]);
    }

    public function viewProduct($id)
    {
        $product = Product::find($id);

        return view('customers.view_product_page',['product'=>$product]);
    }

    public function cart()
    {
        $carts = Cart::where('customer_id',Auth::guard('customer')->id())->get();
        return view('customers.cart_page',['carts'=>$carts]);
    }
    public function addCart($id)
    {
        Cart::create([
            'customer_id'=>Auth::guard('customer')->id(),
            'product_id'=>$id,
            'quantity'=>1
        ]);

        return redirect()->route('customer.cart');
    }
}
