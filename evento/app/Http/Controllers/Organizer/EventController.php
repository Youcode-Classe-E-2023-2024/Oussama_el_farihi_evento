<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; // Make sure to import the Category model

class EventController extends Controller
{
    public function index(){
        $categories = Category::all(); // Fetch all categories from the database
        return view('organizer.events.create', compact('categories')); // Pass the categories to the view
    }
}
