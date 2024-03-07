<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategorieController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function store(Request $request){
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->only('name'));
        return back()->with('success', 'Category created successfully.');
    }

    public function destroy(Category $category){
        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }

    public function update(Request $request, Category $category){
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->only('name'));
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }
    

    
    
}
