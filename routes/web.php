<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');

// Masuk ke admin
Route::get('/admin/{id}/list-products', [ProductsController::class, 'list_products'])->name('admin.list-products');
Route::get('/merchant/{id}/list-products', [ProductsController::class, 'merchant_list'])->name('merchant.list-products');

// Admin 12
Route::get('/tambah-product/{id}', [ProductsController::class, 'PageCreate'])->name('product.create');
Route::post('/tambah-product/{id}', [ProductsController::class, 'create'])->name('product.post');
Route::get('/{userId}/product/{productId}', [ProductsController::class, 'pageUpdate'])->name('product.edit');
Route::put('/{userId}/product/{product}', [ProductsController::class, 'update'])->name('product.update');
Route::delete('/{userId}/product/{productId}', [ProductsController::class, 'delete'])->name('product.delete');
Route::get('/profile/{id}', [ProductsController::class, 'profile'])->name('profile.index');

// Admin 16
Route::get('/merchant/tambah-product/{id}', [ProductsController::class, 'MerchantCreate'])->name('merchant.create');
Route::post('/merchant/tambah-product/{id}', [ProductsController::class, 'createMerchant'])->name('merchant.post');
Route::get('/{userId}/merchant/{productId}', [ProductsController::class, 'HalamanUpdate'])->name('merchant.edit');
Route::put('/{userId}/merchant/{product}', [ProductsController::class, 'updateMerchant'])->name('merchant.update');
Route::delete('/{userId}/merchant/{productId}', [ProductsController::class, 'hapus'])->name('merchant.delete');
Route::get('/merchant/profile/{id}', [ProductsController::class, 'profileMerchant'])->name('merchant_profile.index');