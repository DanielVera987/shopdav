<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'image')->limit(8)->get();
        return view('welcome', compact('categories'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function shop_index(Request $request)
    {
        $subcategories = Subcategory::with('product')->select('id', 'name')->get();
        $products = Product::filtersAnPaginate();

        return view('shop.index', compact('subcategories', 'products'));
    }
}
