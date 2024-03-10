<x-organizer-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Events Awaiting Approval</h1>
                </div>

                <div class="overflow-x-auto mt-6">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Event Name
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Location
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                                {{ $booking->event->title }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                        {{ $booking->event->date->format('m/d/Y') }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 dark:text-white whitespace-no-wrap">
                                        {{ $booking->event->location }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    @if(!$booking->is_approved) <!-- Assuming 'is_approved' marks the booking status -->
                                        <a href="{{ route('organizer.bookings.approve', $booking->id) }}" class="text-indigo-600 hover:text-indigo-900">Approve</a>
                                    @else
                                        <span class="text-green-500">Approved</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-organizer-layout>
