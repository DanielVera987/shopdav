<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if ($request->hasFile('image')) {

            $image = $request->image;
            $imageName = time() . bcrypt($image->getClientOriginalName()) . '.' . $request->image->extension();

            Category::create([
                "name" => $request->name,
                "description" => $request->description,
                "image" => $imageName
            ]);

            Storage::disk('categories')->put($imageName, File::get($image));

            return redirect()->route('admin.categories.index')->with('success', 'Categoria creada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {

        $category->update([
            "name" => $request->name,
            "description" => $request->description
        ]);

        if ($request->hasFile('image')) {

            if (Storage::disk('categories')->exists($category->image)) {
                Storage::disk('categories')->delete($category->image);
            }

            $image = $request->image;
            $imageName = time() . bcrypt($image->getClientOriginalName()) . '.' . $request->image->extension();

            Storage::disk('categories')->put($imageName, File::get($image));
            $category->update(["image" => $imageName]);
        }

        return redirect()->route('admin.categories.edit', $category->id)->with('success', 'Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Storage::disk('categories')->exists($category->image)) {
            Storage::disk('categories')->delete($category->image);
        }
        
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Categoria eliminada');
    }
}
