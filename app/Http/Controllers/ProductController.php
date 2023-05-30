<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category','subcategory')->get();
        return view('product.index', compact('product'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('product.create',compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
           'name' => 'required|max:20',
           'description' => 'required|max:150',
           'price' => 'required',
           'quantity' => 'required',
           'category_id'=>'required',
           'subcategory_id'=>'required',
       ]);
        $record = Product::create($validatedData);
        if ($record) {
            $request->session()->flash('success', 'Product created successfully');
        } else {
            $request->session()->flash('error', 'Failed to create product');
        }
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Product::with('category','subcategory')->find($id);
        return view('product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('product.edit', compact('data','subcategories','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $product = Product::find($id);
        $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|max:150',
            'price' => 'required',
            'quantity' => 'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
        ]);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}
