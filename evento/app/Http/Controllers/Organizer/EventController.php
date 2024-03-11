<?php

namespace App\Http\Controllers\Organizer;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{

    public function index2()
{
    $organizerId = auth()->id();
    $events = Event::where('user_id', $organizerId)->get();
    // dd($events);
    return view('organizer.events.index', compact('events'));
}
    public function index(){
        $categories = Category::all();
        return view('organizer.events.create', compact('categories'));
    }

    public function edit($eventId)
{
    $event = Event::findOrFail($eventId);

    // Clear the events cache
    Cache::forget('events');


    return view('organizer.events.edit', compact('event'));
}


    public function store(Request $request)
    {
        
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'available_spots' => 'required|integer',
            'bookings_type' => 'required|integer',
            'image' => 'sometimes|file|image|max:5000',
        ]);

        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('event_images', 'public');
        }

        Event::create($data);

        // dd($request);
        // Clear the events cache
        Cache::forget('events');


        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully.');
    }

    public function update(Request $request, $eventId)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
        'available_spots' => 'required|integer',
        'bookings_type' => 'required|integer',
    ]);

    $event = Event::findOrFail($eventId);
    $event->update($validatedData);

    // Clear the events cache
    Cache::forget('events');


    return redirect()->route('organizer.events.index')->with('success', 'Event updated successfully.');
}

public function destroy($eventId)
{
    $event = Event::findOrFail($eventId);
    $event->delete();

    // Clear the events cache
    Cache::forget('events');


    return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully.');
}

public function show($eventId)
{
    $event = Cache::remember("events.show.{$eventId}", 60, function () use ($eventId) {
        return Event::findOrFail($eventId);
    });


    return view('events.index', compact('event'));
}

public function showByCategory($id)
{
    $category = Category::findOrFail($id);
    $events = Cache::remember("events.category.{$id}", 60, function () use ($id) {
        return Event::where('category_id', $id)->get();
    });


    return view('events.events_by_categ', compact('events', 'category'));
}




}