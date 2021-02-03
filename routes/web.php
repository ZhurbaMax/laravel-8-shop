<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Home page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Shope
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'getShop'])->name('shop');
Route::get('/search-title', [App\Http\Controllers\ShopController::class, 'titleFilter']);
Route::get('/filter-price', [App\Http\Controllers\ShopController::class, 'filterPrice']);
Route::get('/filter-brand', [App\Http\Controllers\ShopController::class, 'brandFilter']);

//Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'create']);
Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('addProduct');
Route::get('/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
Route::get('/admin/product/{id}/delete', [App\Http\Controllers\AdminController::class, 'destroy'])->name('products-destroy');
Route::get('/edit/{id}', [App\Http\Controllers\AdminController::class, 'editProduct']);
Route::put('/update/{id}', [App\Http\Controllers\AdminController::class, 'updateProduct'])->name('edit.update');
//Orders admin
Route::get('/admin/orders',[App\Http\Controllers\AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/orders/{id}',[App\Http\Controllers\AdminController::class, 'detailOrder'])->name('detail.order');

//Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.page');
Route::get('/cart/order', [App\Http\Controllers\CartController::class, 'order'])->name('cart.order');
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'cartAdd'])->name('cart.add');
Route::post('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'cartRemove'])->name('cart.remove');
//Checkout
Route::get('/cart/checkout', [App\Http\Controllers\CheckoutController::class, 'cartCheckout'])->name('cart.checkout');
Route::post('/cart/checkout', [App\Http\Controllers\CheckoutController::class, 'checkoutConfirm'])->name('checkout.confirm');

