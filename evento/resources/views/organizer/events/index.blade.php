<x-organizer-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Manage Events</h1>
                    <a href="{{ route('organizer.events.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Create Event
                    </a>
                </div>

                <div class="overflow-x-auto mt-6">
                    <table class="text-left w-full border-collapse">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-200 border-b border-gray-300">Title</th>
                                <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-200 border-b border-gray-300">Date</th>
                                <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-200 border-b border-gray-300">Location</th>
                                <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-200 border-b border-gray-300">Available Spots</th>
                                <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-200 border-b border-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800">
                            @foreach($events as $event)
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-700">{{ $event->title }}</td>
                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-700">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-700">{{ $event->location }}</td>
                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-700">{{ $event->available_spots }}</td>
                                <td class="py-4 px-6 border-b border-gray-300 dark:border-gray-700">
                                    <a href="{{ route('organizer.events.edit', $event->id) }}" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition ease-in-out duration-150 mr-2">Edit</a>
                                    <form action="{{ route('organizer.events.destroy', $event->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition ease-in-out duration-150" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
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
