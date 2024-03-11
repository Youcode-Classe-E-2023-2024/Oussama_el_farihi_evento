<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

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

    public function indexWelcome()
{
    $categories = Category::all();
    
    $events = Cache::remember('events', 60, function () {
        return Event::where('status', 1)->paginate(6);
    });

    // dd($categories, $events);

    return view('welcome', compact('categories', 'events'));
}

public function searchEvents(Request $request)
{
    $search = $request->input('search');
    $events = Event::where('title', 'like', '%' . $search . '%')->get();
    return view('events.partials.searchResults', compact('events'));
}



}
