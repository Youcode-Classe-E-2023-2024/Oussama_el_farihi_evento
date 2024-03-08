<x-organizer-layout>
<div class="py-12 w-full">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Manage Events</h2>
                <a href="{{ route('organizer.events.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition ease-in-out duration-150">
                    Create Event
                </a>
            </div>
            <table class="text-left w-full border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">Title</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">Date</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">Location</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">Nombre de places disponibles:</th>
                        <th class="py-3 px-6 font-bold uppercase text-sm text-gray-600 border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr class="hover:bg-gray-50">
                        <td class="py-4 px-6 border-b border-gray-300">{{ $event->title }}</td>
                        <td class="py-4 px-6 border-b border-gray-300">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                        <td class="py-4 px-6 border-b border-gray-300">{{ $event->location }}</td>
                        <td class="py-4 px-6 border-b border-gray-300">{{ $event->available_spots }}</td>
                        <td class="py-4 px-6 border-b border-gray-300">
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
</x-organizer-layout>
