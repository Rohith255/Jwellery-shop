<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $category = Category::with('products')->findOrFail($id);

        return view('customers.product_page',['category'=>$category]);
    }

    public function viewProduct($id)
    {
        $product = Product::find($id);

        return view('customers.view_product_page',['product'=>$product]);
    }

    public function cart()
    {
        $cart = Cart::where('customer_id',Auth::guard('customer')->id())->with('products')->get();

        return view('customers.cart_page',['cart'=>$cart]);
    }
    public function addCart($id)
    {
        $cart_user = Cart::where('customer_id',Auth::guard('customer')->id())->first();

        if (!$cart_user){
            $cart = Cart::create([
                'customer_id'=>Auth::guard('customer')->id(),
            ]);

            DB::table('cart_product')->insert([
                'cart_id'=>$cart->id,
                'product_id'=>$id
            ]);

            return 'cart created and product added';
        }
        else{
            $product = DB::table('cart_product')->where('cart_id',$cart_user->id and 'product_id',$id)->get();

            if ($product->count()==0){
                DB::table('cart_product')->insert([
                    'cart_id'=>$cart_user->id,
                    'product_id'=>$id
                ]);
                return 'product added';
            }
            else {
                return 'product already added';
            }
        }

    }
    public function deleteCart($id)
    {

        $cart_user = Cart::where('customer_id',Auth::guard('customer')->id())->first();

        DB::table('cart_product')->where('cart_id',$cart_user->id)->where('product_id',$id)->delete();

        return redirect()->route('customer.cart');
    }
    public function quantityAdd($id)
    {

        $cart = Cart::where('customer_id',Auth::guard('customer')->id())->where('product_id',$id)->get();

        foreach ($cart as $cart){
            $new_quantity = $cart->quantity;
        }
        $cart->update([
            'quantity'=>$new_quantity+1,
        ]);
        return redirect()->back();
    }

    public function quantitySub($id)
    {
        $cart = Cart::where('customer_id',Auth::guard('customer')->id())->where('product_id',$id)->get();

        foreach ($cart as $cart){
            $new_quantity = $cart->quantity;
        }
        if ($new_quantity>1) {
            $cart->update([
                'quantity'=>$new_quantity-1,
            ]);
            return redirect()->back();
        }
        else{
            $cart = Cart::where('customer_id',Auth::guard('customer')->id())->where('product_id',$id)->delete();
            return redirect()->route('customer.cart');
        }
    }
    public function allProduct()
    {
        $products = Product::all();
        return view('customers.all_product_page',['products'=>$products]);
    }
}
