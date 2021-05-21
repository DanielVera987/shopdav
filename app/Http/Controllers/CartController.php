<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function condition_tax()
    {
        $condition = new \Darryldecode\Cart\CartCondition([
            'name' => 'IVA 16%',
            'type' => 'tax',
            'target' => 'total',
            'value' => '16.00%',
            'attribute' => [
                'description' => 'Value added tax'
            ]
        ]);

        \Cart::condition($condition);
    }

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
        $this->condition_tax();

        $cart = \Cart::getContent();
        $subtotal = \Cart::getSubTotal();
        $total = \Cart::getTotal();
        $condition_tax = \Cart::getCondition('IVA 16%');
        $tax = $condition_tax->getValue();
        $conditionCalculatedValue = $condition_tax->getCalculatedValue($subtotal);

        return view('cart.checkout', compact('cart', 'subtotal', 'total', 'tax', 'conditionCalculatedValue'));
    }

    public function clear()
    {
        \Cart::clear();

        return redirect()->route('shop.index');
    }

    public function editItem($id, Request $request)
    {
        \Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
        ));

        return request()->json(200);
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
