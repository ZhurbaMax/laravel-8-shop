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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/shop', [App\Http\Controllers\ShopController::class, 'getShop'])->name('shop');
//Route::get('/shop', [App\Http\Controllers\ShopController::class, 'showBrands']);
Route::get('/search-title', [App\Http\Controllers\ShopController::class, 'titleFilter']);
Route::get('/filter-price', [App\Http\Controllers\ShopController::class, 'filterPrice']);
Route::get('/filter-brand', [App\Http\Controllers\ShopController::class, 'filterPrice']);

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'create']);
Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'addProduct'])->name('addProduct');
Route::get('/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
Route::get('/admin/product/{id}/delete', [App\Http\Controllers\AdminController::class, 'destroy'])->name('products-destroy');
Route::get('edit/{id}', [App\Http\Controllers\AdminController::class, 'editProduct']);
Route::post('/update/{id}', [App\Http\Controllers\AdminController::class, 'updateProduct']);


