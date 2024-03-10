<?php

namespace App\Http\Controllers\Organizer;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        return view('organizer.index');
    }

    public function eventStatistics()
{
    $organizerId = Auth::id();

    $events = Event::withCount('bookings')
                   ->where('user_id', $organizerId)
                   ->get();

    $totalBookings = $events->sum('bookings_count');
    $mostReservedEvent = $events->sortByDesc('bookings_count')->first();

    return view('organizer.index', compact('events', 'totalBookings', 'mostReservedEvent'));
}

    

    
}
