<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::view('reg','customers.customer-registration-page');
Route::view('log','customers.customer-login-page');
Route::view('admin-login','admin.admin-login');
Route::get('add-product',function (){
    return view('admin.product.add-products');
});
Route::view('customer','admin.customer.customer-list');
Route::view('product','admin.product.display-products');
Route::view('feedback','admin.customer.customer-feedback');
Route::view('review','admin.product.product-review');
Route::view('orders','admin.order-details.product-purchased');

Route::view('home','customers.home');
Route::view('navbar','customers.navbar');
Route::view('product','customers.product_page')->name('customer.product-page');
Route::view('view-product','customers.view_product_page')->name('customer.view_product');

Route::get('customer/login',function (){
    return view('customers.customer-login-page');
})->name('customer.login');

Route::get('customer/register',function (){
    return view('customers.customer-registration-page');
})->name('customer.register');

Route::view('category','customers.category_page')->name('customer.category');
Route::view('home','customers.home')->name('customer.home');

Route::view('review','customers.review_page');

Route::view('cart-page','customers.cart_page')->name('customer.cart-page');
Route::view('order-page','customers.order_page')->name('customer.order-page');

Route::view('profile-page','customers.profile_page');
Route::view('my-cart','customers.my-cart_page');

Route::get('admin-login',[AdminAuthController::class,'login'])->name('admin.login');
Route::post('admin-store',[AdminAuthController::class,'store'])->name('admin.store');
Route::post('admin-logout',[AdminAuthController::class,'logout'])->name('admin.logout');
Route::get('admin-dashboard',function (){
    return view('admin.admin-dashboard');
})->name('admin.dashboard')->middleware('auth:admin');


require __DIR__.'/auth.php';
