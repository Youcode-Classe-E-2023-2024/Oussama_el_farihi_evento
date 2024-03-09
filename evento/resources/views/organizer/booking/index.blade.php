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
                    @forelse($events as $event)
                        <tr>
                            <td class="border px-4 py-2">{{ $event->title }}</td>
                            <td class="border px-4 py-2">{{ $event->date->format('m/d/Y') }}</td>
                            <td class="border px-4 py-2">{{ $event->location }}</td>
                            <td class="border px-4 py-2">
                                <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Approve</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border px-4 py-2 text-center">No events awaiting approval.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-organizer-layout>