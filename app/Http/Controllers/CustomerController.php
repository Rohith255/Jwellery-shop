<?php

namespace App\Http\Controllers;

use App\Jobs\OrderMailJob;
use App\Mail\PlaceOrder;
use App\Mail\PlaceOrders;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index(){
        return view('customers.customer-register');
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers',
            'mobile'=>'required|digits:10',
            'dob'=>'required|date',
            'address'=>'required',
            'password'=>'required|min:8'
        ]);

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

        return redirect()->route('customer.login')->with('account-created','Account Created Successfully');
    }
    public function home()
    {
        return view('customers.hero');
    }
    public function profile()
    {
        $customer = Customer::find(Auth::guard('customer')->id());
        return view('customers.profile',['customer'=>$customer]);
    }
    public function update(Request $request)
    {
       $var =  $request->validate([
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'dob'=>'required',
        ]);



        $customer = Customer::find(Auth::guard('customer')->id());

        $mobile = $request->input('mobile');

        $customer->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$mobile,
            'address'=>$request->input('address'),
            'dob'=>$request->input('dob'),
        ]);

        if ($request->input('password')){
            $customer->update([
                'password'=>$request->input('password')
            ]);
        }

        return redirect()->route('customer.profile')->with('updated','Profile has been updated');


    }
    public function delete(){
        $customer = Customer::find(Auth::guard('customer')->id());
        $customer->delete();
        return redirect()->route('customer.register');
    }

    public function category()
    {
        return view('customers.category');
    }

    public function products($id)
    {
        $category = Category::with('products')->findOrFail($id);

        return view('customers.product',['category'=>$category]);
    }

    public function viewProduct($id)
    {
        $product = Product::find($id);

        $reviews = ProductReview::where('product_id',$id)->with('customer')->get();

        return view('customers.view_product',['product'=>$product,'reviews'=>$reviews]);
    }

    public function cart()
    {
        $cart = Cart::where('customer_id',Auth::guard('customer')->id())->with('products')->get();

        return view('customers.cart',['cart'=>$cart]);
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
        return view('customers.all_product',['products'=>$products]);
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

        return view('customers.order',['cart_user'=>$cart_user,'quantity'=>$quantity,'grams'=>$grams]);
    }

    public function placeOrder(Request $request)
    {

        $request->validate([
            'mobile'=>'required',
            'pincode'=>'required',
            'region'=>'required',
            'address'=>'required',
        ]);

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
            $orderProduct->pincode = $request->pincode;
            $orderProduct->mobile = $request->mobile;
            $orderProduct->region = $request->region;
            $orderProduct->save();
        }

        DB::table('cart_product')->where('cart_id',$cart->id)->delete();

        $email = Customer::find(Auth::guard('customer')->id());

        $recent_order = Order::find($order->id);

        $email_send = $email->email;


        OrderMailJob::dispatch($recent_order,$email_send);

        return redirect()->route('customer.my-order')->with('placed','Order Placed Successfully!');
    }

    public function myOrder()
    {

        $orders = Order::where('customer_id',Auth::guard('customer')->id())->with('products')->get();

        return view('customers.my-cart',['orders'=>$orders]);
    }

    public function orderCancel($orderId,$productId)
    {
        $order = Order::find($orderId);

        $product_order = $order->products->where('id', $productId)->first()->pivot;
        $product_order->delete();
        return redirect()->route('customer.my-order')->with('deleted','Product cancelled successfully');;
    }

    public function productReview(Request $request,$productId,$customerId)
    {

        $request->validate([
            'product_review'=>'required'
        ]);

        ProductReview::create([
            'product_reviews'=>$request->input('product_review'),
            'product_id'=>$productId,
            'customer_id'=>$customerId,
        ]);

        return redirect()->back();
    }

    public function silverProduct()
    {
        $products = Product::where('metal_type','silver')->get();

        return view('customers.all_product',['products'=>$products]);
    }

    public function coins()
    {
        $category = Category::with('products')->find(5);

        return view('customers.product',['category'=>$category]);
    }

    public function search(Request $request)
    {
        $query = $request->input('input_search');

        $result = DB::table('products')->select(['id','product_name'])->where('product_name','LIKE','%'.$query.'%')->get();

        echo $result;
    }
}
