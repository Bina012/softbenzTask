<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $only_trashed_category = Category::onlyTrashed()->get();
        return view('category.index', compact('categories', 'only_trashed_category'));
    }


    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = Category::create($validatedData);
        if ($category) {
            $request->session()->flash('success', 'Category created successfully');
        } else {
            $request->session()->flash('error', 'Failed to create Category');
        }
        return redirect()->route('category.index');
    }


    public function show($id)
    {
        $data = Category::find($id);
        return view('category.show', compact('data'));
    }


    public function edit($id)
    {
        $data = Category::find($id);
        return view('category.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');

    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')
            ->with('success', 'Category moved to trash successfully');
    }
}
