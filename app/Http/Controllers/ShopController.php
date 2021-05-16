<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        
    }
    
    public function index()
    {
        $categories = Category::select('id', 'name')->get();
        return view('shop.index', compact('categories'));
    }
}
