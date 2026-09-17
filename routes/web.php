<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rute aplikasi Pengelolaan Data Produk, Kategori, dan User.
|
*/

// Redirect root URL langsung ke daftar produk
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Resource Route untuk Kategori Produk
Route::resource('categories', CategoryController::class);

// Resource Route untuk Produk
Route::resource('products', ProductController::class);

// Resource Route untuk Pengguna (User)
Route::resource('users', UserController::class);
