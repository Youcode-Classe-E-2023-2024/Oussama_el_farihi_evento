<?php

namespace App\Http\Controllers\Organizer;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class EventController extends Controller
{

    public function index2()
{
    $events = Event::all();
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

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('event_images', 'public');
        }

        Event::create($data);

        // dd($request);

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

    return redirect()->route('organizer.events.index')->with('success', 'Event updated successfully.');
}

public function destroy($eventId)
{
    $event = Event::findOrFail($eventId);
    $event->delete();

    return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully.');
}

}