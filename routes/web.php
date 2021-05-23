<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Open Routes
    Route::get('/', [FrontendController::class, 'index'])->name('index');
    Route::get('/categories', [FrontendController::class, 'categories'])->name('categories.index');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/shop', [FrontendController::class, 'shop_index'])->name('shop.index');

    // Router Cart
    Route::get('/cart-checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/cart-clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/cart-removeitem/{id}', [CartController::class, 'removeitem'])->name('cart.removeitem');

    // Router Ajax
    Route::post('/cart-add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart/totals', [CartController::class, 'totals'])->name('cart.totals');
    Route::post('/cart-edit/{id}', [CartController::class, 'editItem'])->name('cart');
    Route::get('/apply/coupon/{code}', [CouponController::class, 'apply'])->name('coupon.apply');

// Authenticated users routes
Route::middleware('auth', 'role:user')->group(function () {

});

// Adminstrator Routes
Route::middleware('auth', 'role:super-admin')->group(function () {
    Route::get('/admin/dashboard', function () { return view('dashboard'); })->name('dashboard');

    //CRUD Categories
    Route::get('/admin/categories/index', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
});

// Login & Register Routes
require __DIR__.'/auth.php';