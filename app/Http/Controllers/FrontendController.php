<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'image')->limit(8)->get();
        return view('welcome', compact('categories'));
    }

    public function shop_index()
    {
        $categories = Category::select('id', 'name')->get();
        $products = Product::with('brand', 'subcategory', 'discount')->get();
        return view('shop.index', compact('categories', 'products'));
    }
}
