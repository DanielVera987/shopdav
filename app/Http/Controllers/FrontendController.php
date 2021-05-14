<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->limit(8)->get();
        $categories = Category::limit(8)->get();
        return view('welcome', compact('products', 'categories'));
    }
}
