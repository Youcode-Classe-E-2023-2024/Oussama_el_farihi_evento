<x-organizer-layout>
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-xl font-semibold">Events Awaiting Approval</h2>
        <div class="mt-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Event Name</th>
                        <th class="px-4 py-2">Date</th>
                        <th class="px-4 py-2">Location</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bookings as $booking)
    <tr>
        <td>{{ $booking->event->title }}</td>
        <td>{{ $booking->event->date->format('m/d/Y') }}</td>
        <td>{{ $booking->event->location }}</td>
        <td>
            @if(!$booking->is_approved) <!-- Assuming 'is_approved' marks the booking status -->
                <a href="{{ route('organizer.bookings.approve', $booking->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Approve</a>
            @else
                Approved
            @endif
        </td>
    </tr>
@endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-organizer-layout>