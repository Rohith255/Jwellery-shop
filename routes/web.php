<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
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

//Admin - routes

Route::get('admin/login',[AdminAuthController::class,'login'])->name('admin.login');
Route::post('admin/store',[AdminAuthController::class,'store'])->name('admin.store');
Route::post('admin/logout',[AdminAuthController::class,'logout'])->name('admin.logout');


Route::prefix('admin')->middleware('Admin:admin')->group(function (){
    Route::view('dashboard','admin.admin-dashboard')->name('admin.dashboard');
    Route::get('home',[AdminController::class,'home'])->name('admin.home');
    Route::get('customer/list',[AdminController::class,'customerList'])->name('admin.customer.list');
    Route::delete('customer/delete/{id}',[AdminController::class,'delete'])->name('admin.customer.delete');
    Route::get('add-product',[AdminController::class,'addProduct'])->name('admin.addProduct');
    Route::post('store-product',[AdminController::class,'productStore'])->name('product.store');
    Route::get('product-list',[AdminController::class,'productView'])->name('product.view');
    Route::post('product/update/{id}',[AdminController::class,'productUpdatePage'])->name('product.update.page');
    Route::put('product-update/{id}',[AdminController::class,'productUpdate'])->name('product.update');
    Route::delete('product-delete/{id}',[AdminController::class,'productDelete'])->name('product.delete');
    Route::get('order-details',[AdminController::class,'orders'])->name('admin.orders');
    Route::get('order-details/download',[AdminController::class,'orderDownload'])->name('admin.download-order');
    Route::get('order-status',[AdminController::class,'orderStatus'])->name('admin.order-status');
    Route::post('status/{orderId}/change/{productId}',[AdminController::class,'statusChange'])->name('admin.status-change');
    Route::post('customer-details/{id}',[AdminController::class,'customerDetails'])->name('admin.customer-details');
    Route::get('product/review',[AdminController::class,'productReview'])->name('admin.product-review');
});


//Customer - routes

Route::prefix('customer')->group(function (){
    Route::get('login',[CustomerAuthController::class,'login'])->name('customer.login');
    Route::post('store',[CustomerAuthController::class,'store'])->name('customer.store');
    Route::get('logout',[CustomerAuthController::class,'logout'])->name('customer.logout');
    Route::get('register',[CustomerController::class,'index'])->name('customer.register');
    Route::post('store-user',[CustomerController::class,'store'])->name('customer.store.user');
});


Route::get('home',[CustomerController::class,'home'])->name('customer.home');
Route::get('category',[CustomerController::class,'category'])->name('customer.category');
Route::get('products/{id}',[CustomerController::class,'products'])->name('customer.products');
Route::get('view-product/{id}',[CustomerController::class,'viewProduct'])->name('customer.view.product');
Route::get('all',[CustomerController::class,'allProduct'])->name('customer.all-product');
Route::get('silver-products',[CustomerController::class,'silverProduct'])->name('silver-products');
Route::get('coins',[CustomerController::class,'coins'])->name('customer.coins');

Route::prefix('customer')->middleware('Customer:customer')->group(function (){
    Route::get('profile',[CustomerController::class,'profile'])->name('customer.profile');
    Route::put('profile-update',[CustomerController::class,'update'])->name('customer.update');
    Route::delete('customer-delete',[CustomerController::class,'delete'])->name('customer.delete');
    Route::get('cart',[CustomerController::class,'cart'])->name('customer.cart');
    Route::post('add-cart/{id}',[CustomerController::class,'addCart'])->name('customer.add-cart');
    Route::delete('cart/delete/{id}',[CustomerController::class,'deleteCart'])->name('customer.delete-cart');
    Route::post('quantityAdd/{id}',[CustomerController::class,'quantityAdd'])->name('customer.quantityAdd');
    Route::post('quantitySub/{id}',[CustomerController::class,'quantitySub'])->name('customer.quantitySub');
    Route::post('order/add',[CustomerController::class,'orderAdd'])->name('customer.order.add');
    Route::post('checkout-page/{id}',[CustomerController::class,'checkoutPage'])->name('customer.checkout-page');
    Route::post('place-order',[CustomerController::class,'placeOrder'])->name('customer.order-place');
    Route::get('my-order',[CustomerController::class,'myOrder'])->name('customer.my-order');
    Route::delete('order/{orderId}/cancel/{productId}',[CustomerController::class,'orderCancel'])->name('customer.order-cancel');
    Route::post('product/{productId}/customer/{customerId}',[CustomerController::class,'productReview'])->name('customer.product-review');
});

require __DIR__.'/auth.php';
