<?php

namespace App\Http\Controllers\Organizer;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category; // Make sure to import the Category model

class EventController extends Controller
{

    public function index2()
{
    $events = Event::all();
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
            'image' => 'sometimes|file|image|max:5000', // Example validation
        ]);

        // Handle file upload for the image, if it exists
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('event_images', 'public');
        }

        // Create the event
        Event::create($data);

        // Redirect or return response
        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully.');
    }

    public function update(Request $request, $eventId)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
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
