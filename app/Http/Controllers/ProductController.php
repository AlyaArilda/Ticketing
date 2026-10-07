<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('Pages.products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        $category = Category::orderBy('name','ASC')->get();
        return view ('Pages.products.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
// {
//     $request->validate([
//         'category_id' => 'required',
//         'name' => 'required',
//         'description' => 'required',
//         'price' => 'required',
//         'image' => 'required|image',
//         'criteria' => 'required',
//         'favorite' => 'required',
//         'status' => 'required',
//         'stock' => 'required',
//     ]);

//     $filename = time() . '.' . $request->image->extension();

//     $request->image->storeAs('public/products', $filename);

//     Product::create([
//         'name' => $request->name,
//         'price' => $request->price,
//         'stock' => $request->stock,
//         'description' => $request->description,
//         'category_id' => $request->category_id,
//         'image' => $filename,
//         'criteria' => $request->criteria,
//         'favorite' => $request->favorite,
//         'status' => $request->status,
//         'stock' => $request->stock
//     ]);

//     return redirect()
//         ->route('products.index')
//         ->with('Create', 'Product created successfully');
// }


public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'criteria' => 'required',
        'favorite' => 'required',
        'status' => 'required',
        'stock' => 'required',
    ]);

    $image = $request->file('image');

    $filename = time() . '.' . $image->getClientOriginalExtension();

    // Simpan ke storage/app/public/products
    $image->storeAs('products', $filename, 'public');

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'image' => 'products/' . $filename,
        'criteria' => $request->criteria,
        'favorite' => $request->favorite,
        'status' => $request->status
    ]);

    return redirect()->route('products.index')
        ->with('Create', 'Product created successfully');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::orderBy('name', 'ASC')->get();
        return view('Pages.products.update', compact('product', 'category'));

    }

    /**
     * Update the specified resource in storage.
     */  
    public function update(Request $request, Product $product)
{
    $product->category_id = $request->category_id;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->criteria = $request->criteria;
    $product->favorite = $request->favorite;
    $product->status = $request->status;
    $product->stock = $request->stock;

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        $filename = $product->id . '.' . $image->extension();

        $image->storeAs('public/products', $filename);

        $product->image = $filename;
    }

    $product->save();

    return redirect()
        ->route('products.index')
        ->with('Update', 'Product updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('Delete', 'Product deleted successfully');
    }
}
