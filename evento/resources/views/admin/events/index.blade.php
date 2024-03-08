<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Event Approvals</h2>
                </div>
                
                @foreach($events as $event)
                    <div class="bg-gray-100 p-4 rounded-lg mb-4 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-700">{{ $event->title }}</h3>
                        <div class="flex justify-between items-center mt-4">
                            <span class="text-sm font-medium text-gray-600">{{ $event->date->format('F d, Y') }}</span>
                            <form action="{{ route('admin.events.approve', $event->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-700 text-black font-semibold text-sm rounded-lg shadow focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75 transition ease-in-out duration-150">
                                    Approve
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                
                @if($events->isEmpty())
                    <div class="text-center py-4">
                        <p class="text-gray-700 text-sm">No events waiting for approval.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
