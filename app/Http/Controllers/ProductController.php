<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductRequest;
use App\Models\ColorProduct;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: generar codigo no repetitivo
        $products = Product::with('images')->paginate();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $colors = Color::all();
        $discounts = Discount::where('active', 1)->get();
        $sizes = Size::all();

        return view('admin.products.create', compact(
            'subcategories',
            'brands',
            'colors',
            'discounts',
            'sizes'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\request\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //TODO: Verificar que el codigo sea unico
        if (
            $request->quantity <= 0
            || !Subcategory::find($request->subcategory_id)
            || !Brand::find($request->brand_id)
        ) {
            return back()->with('warning', 'Algo salio mal intentalo nuevamente');
        }

        if (isset($request->discount_id)) {
            if (!Discount::where('active', 1)->where('id', $request->discount_id)->first()) {
                return back()->with('warning', 'Algo salio mal intentalo nuevamente');
            }
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->content,
            'code' => $request->code,
            'price' => round($request->price, 2),
            'quantity' => intval($request->quantity),
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id,
            'discount_id' => $request->discount_id ?? null
        ]);

        $prodId = $product->id;
        for ($numberImage = 1; $numberImage < 6; $numberImage++) {
            if ($request->hasFile("image{$numberImage}")) {
                $image = $request->file("image{$numberImage}");

                $path = time() . '_' . Str::uuid() . '.' . $image->getClientOriginalExtension();

                Image::create([
                    'product_id' => $prodId,
                    'name' => "image${numberImage}",
                    'path' => $path,
                ]);

                Storage::disk('products')->put($path, File::get($image));
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Producto Creado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
