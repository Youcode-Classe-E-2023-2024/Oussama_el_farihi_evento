<?php

namespace App\Http\Controllers\Organizer;

use PDF;


use App\Models\Event;
use App\Models\Ticket;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{
    public function index(){
        // Retrieve events with bookings where booking_type is 0
        $events = Event::whereHas('bookings', function($query) {
            $query->where('bookings_type', 0);
        })->get();
    
        return view('organizer.booking.index', compact('events'));
    }
    

    public function bookEvent(Request $request, $eventId)
{
    $event = Event::findOrFail($eventId);
    $user = Auth::user();

    // Check if the user has already booked this event
    $existingBooking = Booking::where('event_id', $event->id)->where('user_id', $user->id)->first();
    
    if ($existingBooking) {
        return redirect()->back()->with('error', 'You have already booked this event.');
    }

    if ($event->available_spots > 0) {
        // Proceed with booking
        $booking = new Booking();
        $booking->event_id = $event->id;
        $booking->user_id = $user->id;
        $booking->save();

        // Decrease the available spots
        $event->decrement('available_spots');

        // Check the booking type of the event
        if ($event->bookings_type == 1) { // Automatic
            // Generate and save a ticket
            $ticket = new Ticket();
            $ticket->event_id = $event->id;
            $ticket->user_id = $user->id;
            $ticket->booking_id = $booking->id;
            $ticket->save();

            return redirect()->back()->with('success', 'Your booking has been confirmed, and your ticket is ready.');
        } else {
            return redirect()->back()->with('info', 'Your booking request has been submitted. Please wait for confirmation.');
        }
    } else {
        // No available spots
        return redirect()->back()->with('error', 'Sorry, there are no available spots for this event.');
    }

    if ($event->bookings_type == 1) { 

        $pdf = PDF::loadView('tickets.download', ['event' => $event, 'user' => $user, 'ticket' => $ticket]);
        return $pdf->download('ticket-'.$event->id.'-'.$user->id.'.pdf');
    } else {
        return redirect()->back()->with('info', 'Your booking request has been submitted. Please wait for confirmation.');
    }
}



}
