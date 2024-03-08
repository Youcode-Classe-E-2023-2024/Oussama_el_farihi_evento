<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function approvalIndex()
{
    $events = Event::where('status', false)->get();
    return view('admin.events.index', compact('events'));
}

public function approve(Request $request, Event $event)
{
    $event->status = true;
    $event->save();

    return back()->with('success', 'Event approved successfully.');
}

}
