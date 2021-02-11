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

//Shop
Route::get('/shop', [App\Http\Controllers\ShopController::class, 'getShop'])->name('shop');
Route::get('/shop/product/{id}', [App\Http\Controllers\ShopController::class, 'getProduct'])->name('get.product');
Route::get('/filter', [App\Http\Controllers\ShopController::class, 'getShop'])->name('filter.shop');

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
Route::get('/admin/orders/{id}/delete', [App\Http\Controllers\AdminController::class, 'orderDestroy'])->name('order.destroy');

//Category admin
Route::get('/admin/category',[App\Http\Controllers\AdminController::class, 'adminCategory'])->name('admin.category');
Route::get('/admin/create-category',[App\Http\Controllers\AdminController::class, 'addCategory'])->name('admin.category.add');
Route::post('/admin/category',[App\Http\Controllers\AdminController::class, 'createCategory'])->name('admin.category.create');

//Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart.page');
Route::get('/cart/order', [App\Http\Controllers\CartController::class, 'order'])->name('cart.order');
Route::post('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'cartAdd'])->name('cart.add');
Route::post('/cart/reduce/{id}', [App\Http\Controllers\CartController::class, 'cartReduce'])->name('cart.reduce');
Route::post('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'cartRemove'])->name('cart.remove');
Route::post('/cart/getCountCart', [App\Http\Controllers\CartController::class, 'getCountCart']);
Route::post('/cart', [App\Http\Controllers\CartController::class, 'cartVue'])->name('cart.vue');
Route::post('/update/cart-vue', [App\Http\Controllers\CartController::class, 'updateCartVue']);
Route::post('/delete/product-vue', [App\Http\Controllers\CartController::class, 'deleteProductVue']);

//Checkout
Route::get('/cart/checkout', [App\Http\Controllers\CheckoutController::class, 'cartCheckout'])->name('cart.checkout');
Route::post('/cart/checkout', [App\Http\Controllers\CheckoutController::class, 'checkoutConfirm'])->name('checkout.confirm');
