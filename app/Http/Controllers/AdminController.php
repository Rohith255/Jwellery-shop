<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function customerList(){
        $customers = Customer::all();
        return view('admin.customer.customer-list',['customers'=>$customers]);
    }
    public function delete($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('admin.customer.list')->with('deleted','Customer deleted successfully');
    }

    public function addProduct(){
        return view('admin.product.add-products');
    }
    public function productStore(Request $request)
    {
        $request->validate([
            'product_name'=>'required',
            'product_image'=>'required',
            'category_id'=>'required',
            'serial_number'=>'required',
            'metal_type'=>'required',
            'grams'=>'required'
        ]);

        $name = $request->file('product_image')->getClientOriginalName();

        Product::create([
            'product_name'=>$request->input('product_name'),
            'product_img'=>$name,
            'category_id'=>$request->input('category_id'),
            'serial_number'=>$request->input('serial_number'),
            'metal_type'=>$request->input('metal_type'),
            'grams'=>$request->input('grams')
        ]);

        $image_name = $request->product_name.'.'.$request->product_image->extension();
        $request->product_image->move('products', $image_name);

        return redirect()->route('admin.addProduct')->with('product-added','Product added successfully');
    }

    public function productView()
    {
        $products = Product::with('category')->paginate(2);
        return view('admin.product.display-products',['products'=>$products]);
    }

    public function productUpdatePage($id)
    {
        $product = Product::find($id);
        return view('admin.product.product-update',['product'=>$product]);
    }

    public function productUpdate(Request $request,$id)
    {
        $request->validate([
            'product_name'=>'required',
            'product_image'=>'required',
            'category_id'=>'required',
            'metal_type'=>'required',
            'grams'=>'required'
        ]);
        $product = Product::find($id);
        $product->update([
            'product_name'=>$request->input('product_name'),
            'product_img'=>$request->input('product_image'),
            'category_id'=>$request->input('category_id'),
            'metal_type'=>$request->input('metal_type'),
            'grams'=>$request->input('grams')
        ]);

        return redirect()->route('product.view')->with('product-updated','Product updated successfully');
    }

    public function productDelete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('product.view')->with('product-deleted','Product deleted successfully');
    }

    public function orders()
    {
        $orders = Order::with(['customer','products'])->paginate(6);

        return view('admin.order-details.product-purchased',['orders'=>$orders]);
    }

    public function orderDownload()
    {
        $orders = Order::with(['customer','products'])->get();

        $html = view('admin.order-details.orderPdf',compact('orders'));
        $dompdf = new Dompdf;

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4','portrait');

        $dompdf->render();

        $file_name = 'order-'.date('YmdHis').'.pdf';

        return $dompdf->stream($file_name);
    }

    public function orderStatus()
    {
        $orders = Order::with(['customer','products'])->paginate(4);
        return view('admin.order-details.order_status',['orders' => $orders]);
    }

    public function statusChange($orderId,$productId)
    {
        DB::table('order_products')->where('order_id',$orderId)->where('product_id',$productId)->update([
            'payment_status'=>'DELIVERED',
        ]);

        return redirect()->back()->with('order','Order delivered successfully');
    }

    public function home()
    {
        return view('admin.home');
    }

    public function customerDetails($id)
    {
        $customers = Customer::with('orders.orderProducts.product')->findOrFail($id);

        return view('admin.customer.customer-details',compact('customers'));
    }

    public function productReview()
    {
        $customer = Customer::with('productReview.product')->paginate(1);
        return view('admin.product.product-review',['customers'=>$customer]);
    }
}
