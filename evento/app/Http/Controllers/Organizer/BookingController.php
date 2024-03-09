<?php

namespace App\Http\Controllers\Organizer;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(){
        return view('organizer.booking.index');
    }

    public function bookEvent(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $user = Auth::user();

        // Create a booking
        $booking = new Booking();
        $booking->event_id = $event->id;
        $booking->user_id = $user->id;
        // Add any other relevant fields to the booking
        $booking->save();

        // Check the booking type of the event
        if ($event->bookings_type == 1) { // Automatic
            // Generate and save a ticket
            $ticket = new Ticket();
            $ticket->event_id = $event->id;
            $ticket->user_id = $user->id;
            // Add any other relevant fields to the ticket
            $ticket->save();

            return redirect()->back()->with('success', 'Your booking has been confirmed, and your ticket is ready.');
        } else {
            return redirect()->back()->with('info', 'Your booking request has been submitted. Please wait for confirmation.');
        }
    }
}
