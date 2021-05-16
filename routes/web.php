<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Open Routes
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/shop', [FrontendController::class, 'shop_index'])->name('shop.index');

// Authenticated users routes
Route::middleware('auth', 'role:user')->group(function () {

});

// Adminstrator Routes
Route::middleware('auth', 'role:super-admin')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
});

// Login & Register Routes
require __DIR__.'/auth.php';