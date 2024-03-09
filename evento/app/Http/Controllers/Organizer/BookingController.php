<?php

namespace App\Http\Controllers\Organizer;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PDF;

class BookingController extends Controller
{
    public function index(){
        return view('organizer.booking.index');
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
            $ticket->save();

            return redirect()->back()->with('success', 'Your booking has been confirmed, and your ticket is ready.');
        } else {
            // For manual approval
            return redirect()->back()->with('info', 'Your booking request has been submitted. Please wait for confirmation.');
        }
    } else {
        // No available spots
        return redirect()->back()->with('error', 'Sorry, there are no available spots for this event.');
    }

    if ($event->bookings_type == 1) { // Automatic
        // Generate and save a ticket...
        
        // After saving the ticket, generate a PDF to download
        $pdf = PDF::loadView('tickets.download', ['event' => $event, 'user' => $user]); // Assuming you have a view file for your ticket
        return $pdf->download('ticket-'.$event->id.'-'.$user->id.'.pdf');
    } else {
        // For manual approval
        return redirect()->back()->with('info', 'Your booking request has been submitted. Please wait for confirmation.');
    }
}



}
