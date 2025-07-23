<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:subcategories,name',
            'category_id' => 'required|exists:categories,id',
        ]);
        Subcategory::create($request->only('name', 'category_id'));
        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    public function show(Subcategory $subcategory)
    {
        return view('subcategories.show', compact('subcategory'));
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:subcategories,name,' . $subcategory->id,
            'category_id' => 'required|exists:categories,id',
        ]);
        $subcategory->update($request->only('name', 'category_id'));
        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategory $subcategory)
    {
        if ($subcategory->books()->exists()) {
            return redirect()->route('subcategories.index')->with('error', 'Cannot delete subcategory with books.');
        }
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
} 