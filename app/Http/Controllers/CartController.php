<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function add(Request $request)
    {
        if (!$request->product_id && empty($request->product_id)) {
            return response()->json(400, [
                "error" => "Error product id"
            ]);
        }

        $product = Product::with('images')->findOrFail($request->product_id);
        \Cart::add(
            $product->id,
            $product->name,
            $product->price,
            1,
            [
                "image" => $product->images[0]->path ?? 'https://via.placeholder.com/140x100'
            ]
        );

        return response()->json([
            "status" => "ok",
            "total" => \Cart::getContent()->count()
        ]);
    }

    public function checkout()
    {
        $cart = \Cart::getContent();
        $subtotal = \Cart::getSubTotal();

        return view('cart.checkout', compact('cart', 'subtotal'));
    }

    public function clear()
    {
        \Cart::clear();

        return redirect()->route('shop.index');
    }

    public function removeitem($id)
    {
        \Cart::remove($id);

        return redirect()->route('cart.checkout');
    }

    public function totals()
    {
        return response()->json([
            "total" => \Cart::getContent()->count()
        ]);
    }
}
