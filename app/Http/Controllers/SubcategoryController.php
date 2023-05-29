<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('subcategory.index',compact('subcategories'));
    }


    public function show($id)
    {
        $data = Subcategory::find($id);
        return view('subcategory.show', compact('data'));
    }


    public function edit($id)
    {
        $data = Subcategory::find($id);
        return view('subcategory.edit', compact('data'));
    }



    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $subcategory->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Subcategory updated successfully');
    }

    public function destroy(Subcategory $subcategory)
    {
    }
}
