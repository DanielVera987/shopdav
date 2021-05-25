<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SubcategoryRequest;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();

        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        Category::findOrFail($request->input('category_id')); 

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time() . '-' . Str::uuid() . '.' . $image->getClientOriginalExtension();
            
            Subcategory::create([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'image' => $imageName
            ]);

            Storage::disk('subcategories')->put($imageName, File::get($image));

            return redirect()->route('admin.subcategories.index')->with('success', 'Subcategoria creada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\CategoryRequest  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id
        ]); 

        if ($request->hasFile('image')) {
            if (Storage::disk('subcategories')->exists($subcategory->image)) {
                Storage::disk('subcategories')->delete($subcategory->image);
            }

            $image = $request->image;
            $imageName = time() . '-' . Str::uuid() . '.' . $image->getClientOriginalExtension();

            Storage::disk('subcategories')->put($imageName, File::get($image));

            $subcategory->update(['image' => $imageName]);
        }

        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {

        if (Storage::disk('subcategories')->exists($subcategory->image)) {
            Storage::disk('subcategories')->delete($subcategory->image);
        }

        $subcategory->delete();
        return redirect()->route('admin.subcategories.index')->with('success', 'Subcategoria eliminada');
    }
}
