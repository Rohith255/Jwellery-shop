<?php

namespace App\Providers;

use App\Models\CartProduct;
use App\Models\Customer;
use App\Models\OrderProduct;
use App\Models\Product;
use Cassandra\Custom;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
     Paginator::useBootstrapFive();

     \View::composer('admin.home',function ($view){

         $product_count = Product::count();
         $customer_count = Customer::count();
         $order_count = \DB::table('order_products')->count();
         $pending_count = \DB::table('order_products')->where('payment_status','PENDING')->count();
         $cart_count = \DB::table('cart_Product')->count();

         $count = [
             'product_count'=>$product_count,
             'customer_count'=>$customer_count,
             'order_count'=>$order_count,
             'pending_count'=>$pending_count,
             'cart_count'=>$cart_count,
         ];

         $view->with('count',$count);
     });

    }
}
