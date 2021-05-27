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

    public function getProducts()
    {
        return Product::all();
    }

    public function getOneProduct(Product $product)
    {
        $product = Product::with('brand', 'subcategory', 'discount', 'images', 'sizes')->find($product->id);
        $products = Product::limit(8)->get();
        //return $product;
        return view('products.show', compact('product', 'products'));
    }
}
