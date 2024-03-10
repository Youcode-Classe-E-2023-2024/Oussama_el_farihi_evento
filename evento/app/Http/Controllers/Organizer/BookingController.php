<?php

namespace App\Http\Controllers\Organizer;



use App\Models\Event;
use App\Models\Ticket;
use App\Models\Booking;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
   public function index()
{
    $organizerId = auth()->id();
    $bookings = Booking::whereHas('event', function($query) use ($organizerId) {
        $query->where('bookings_type', 0)
              ->where('user_id', $organizerId);
    })->where('is_approved', false)->get();

    return view('organizer.booking.index', compact('bookings'));
}


public function approveBooking($bookingId)
{
    $booking = Booking::findOrFail($bookingId);
    $booking->is_approved = true;
    $booking->save();

    return redirect()->route('organizer.booking.index')->with('success', 'Booking approved successfully.');
}


    

public function bookEvent(Request $request, $eventId, PDF $pdf)
{
    $event = Event::findOrFail($eventId);
    $user = Auth::user();

    $existingBooking = Booking::where('event_id', $event->id)->where('user_id', $user->id)->first();
    
    if ($existingBooking) {
        return redirect()->back()->with('error', 'You have already booked this event.');
    }

    if ($event->available_spots > 0) {
        $booking = new Booking();
        $booking->event_id = $event->id;
        $booking->user_id = $user->id;
        $booking->is_approved = $event->bookings_type == 1;
        $booking->save();


        $event->decrement('available_spots');

        if ($event->bookings_type == 1) {
            $ticket = new Ticket();
            $ticket->event_id = $event->id;
            $ticket->user_id = $user->id;
            $ticket->booking_id = $booking->id;
            $ticket->save();

            $pdf = $pdf->loadView('tickets.download', ['event' => $event, 'user' => $user, 'ticket' => $ticket]);
            return $pdf->download('ticket-'.$event->id.'-'.$user->id.'.pdf');
        } else {
            return redirect()->back()->with('info', 'Your booking request has been submitted. Please wait for confirmation.');
        }
    } else {
        return redirect()->back()->with('error', 'Sorry, there are no available spots for this event.');
    }
}




}
