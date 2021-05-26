<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubcategoryController;

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
Route::middleware('auth', 'role:super-admin')
    ->prefix('admin')
    ->group(function () 
    {
        Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

        //CRUD Categories
        Route::resource('categories',CategoryController::class)->except(['show'])->names([
            'index' => 'admin.categories.index',
            'create' => 'admin.categories.create',
            'store' => 'admin.categories.store',
            'edit' => 'admin.categories.edit',
            'update' => 'admin.categories.update',
            'destroy' => 'admin.categories.destroy'
        ]);

        //CRUD Subcategory
        Route::resource('subcategories', SubcategoryController::class)->except(['show'])->names([
            'index' => 'admin.subcategories.index',
            'create' => 'admin.subcategories.create',
            'store' => 'admin.subcategories.store',
            'edit' => 'admin.subcategories.edit',
            'update' => 'admin.subcategories.update',
            'destroy' => 'admin.subcategories.destroy'
        ]);

        //CRUD Brand
        Route::resource('brands', BrandController::class)->except(['show'])->names([
            'index' => 'admin.brands.index',
            'create' => 'admin.brands.create',
            'store' => 'admin.brands.store',
            'edit' => 'admin.brands.edit',
            'update' => 'admin.brands.update',
            'destroy' => 'admin.brands.destroy'
        ]);

        //CRUD Discount
        Route::resource('discounts', DiscountController::class)->except(['show'])->names([
            'index' => 'admin.discounts.index',
            'create' => 'admin.discounts.create',
            'store' => 'admin.discounts.store',
            'edit' => 'admin.discounts.edit',
            'update' => 'admin.discounts.update',
            'destroy' => 'admin.discounts.destroy'
        ]);
    });

// Login & Register Routes
require __DIR__.'/auth.php';