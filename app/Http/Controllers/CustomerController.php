<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        Cart::create([
            'customer_id' => $customer->id,
        ]);

        return redirect()->route('customer.login');
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
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'dob'=>'required',
            'password'=>'required',
        ]);

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

            return redirect()->route('customer.cart')->with('added','Added to the Cart!');
        }
        else{
            $product = DB::table('cart_product')->where('cart_id',$cart_user->id)->where('product_id',$id)->get();

            if ($product->count()==0){
                DB::table('cart_product')->insert([
                    'cart_id'=>$cart_user->id,
                    'product_id'=>$id
                ]);
                return redirect()->route('customer.cart')->with('added','Added to the Cart!');
            }
            else {
                return redirect()->route('customer.cart')->with('already-added','Product already in Cart!');
            }
        }

    }
    public function deleteCart($id)
    {

        $cart_user = Cart::where('customer_id',Auth::guard('customer')->id())->first();

        DB::table('cart_product')->where('cart_id',$cart_user->id)->where('product_id',$id)->delete();

        return redirect()->route('customer.cart')->with('cart-deleted','Product deleted from Cart!');
    }
    public function quantityAdd($id)
    {
        $cart_user = Cart::where('customer_id',Auth::guard('customer')->id())->first();

        $cart_product = DB::table('cart_product')->where('cart_id',$cart_user->id)->where('product_id',$id)->first();

        DB::table('cart_product')->where('product_id',$id)->update([
            'quantity'=>$cart_product->quantity+1,
        ]);

        return redirect()->back();
    }

    public function quantitySub($id)
    {
        $cart_user = Cart::where('customer_id',Auth::guard('customer')->id())->first();

        $cart_product = DB::table('cart_product')->where('cart_id',$cart_user->id)->where('product_id',$id)->first();

        if ($cart_product->quantity>1){
            DB::table('cart_product')->where('cart_id',$cart_user->id)->where('product_id',$id)->update([
                'quantity'=>$cart_product->quantity-1,
            ]);
            return redirect()->back();
        }
        else{
            DB::table('cart_product')->where('cart_id',$cart_user->id)->where('product_id',$id)->delete();
            return redirect()->back();
        }
    }
    public function allProduct()
    {
        $products = Product::all();
        return view('customers.all_product_page',['products'=>$products]);
    }

    public function checkoutPage($id)
    {
        $cart_user = Cart::where('customer_id',Auth::guard('customer')->id())->with('products')->get();
        $quantity = 0;
        $grams = 0;
        foreach ($cart_user as $cart){
            foreach ($cart->products as $product){
                if ($product->pivot->quantity>1){
                 $grams+=$product->grams*2;
                }
                else{
                    $grams+=$product->grams;
                }
            }
        }

        return view('customers.order_page',['cart_user'=>$cart_user,'quantity'=>$quantity,'grams'=>$grams]);
    }

    public function placeOrder(Request $request)
    {
        $cart = Cart::where('customer_id',Auth::guard('customer')->id())->first();

        $order = new Order;
        $order->customer_id =Auth::guard('customer')->id();
        $order->save();

        $products = $cart->products;

        foreach ($products as $product){
            $orderProduct = new OrderProduct;
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $product->id;
            $one_gram = 6038;
            $amount = $one_gram*$product->grams*$product->pivot->quantity;
            $orderProduct->amount = $amount;
            $orderProduct->order_date = Carbon::today()->toDateString();
            $orderProduct->delivery_date = Carbon::today()->addWeek()->toDateString();
            $orderProduct->invoice_number = 'SJS-' .mt_rand(100000,999999);
            $orderProduct->delivery_address = $request->input('address');
            $orderProduct->quantity = $product->pivot->quantity;
            $orderProduct->payment_mode = 'COD';
            $orderProduct->payment_status = 'PENDING';
            $orderProduct->save();
        }

        DB::table('cart_product')->where('cart_id',$cart->id)->delete();

        return redirect()->route('customer.my-order')->with('placed','Order Placed Successfully!');
    }

    public function myOrder()
    {

        $orders = Order::where('customer_id',Auth::guard('customer')->id())->with('products')->get();


        return view('customers.my-cart_page',['orders'=>$orders]);
    }

    public function orderCancel($orderId,$productId)
    {
        $order = Order::find($orderId);

        $product_order = $order->products->where('id', $productId)->first()->pivot;
        $product_order->delete();
        return redirect()->route('customer.my-order')->with('deleted','Product cancelled successfully');;
    }
}
