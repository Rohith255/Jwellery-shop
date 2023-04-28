<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
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
        Product::create([
            'product_name'=>$request->input('product_name'),
            'product_img'=>$request->input('product_image'),
            'category_id'=>$request->input('category_id'),
            'metal_type'=>$request->input('metal_type'),
            'grams'=>$request->input('grams')
        ]);

        return redirect()->route('admin.addProduct')->with('product-added','Product added successfully');
    }

    public function productView()
    {
        $products = Product::paginate(4);
        return view('admin.product.display-products',['products'=>$products]);
    }

    public function productUpdatePage($id)
    {
        $product = Product::find($id);
        return view('admin.product.product-update',['product'=>$product]);
    }

    public function productUpdate(Request $request,$id)
    {
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
}
