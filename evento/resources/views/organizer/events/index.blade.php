<x-organizer-layout>
<div class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap -mx-4">
            @foreach($events as $event)
                <div class="w-full lg:w-1/3 px-4 mb-8">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <img class="w-full" src="{{ $event->image }}" alt="Event Image">
                        <div class="p-4">
                            <h1 class="text-2xl font-bold mb-2">{{ $event->title }}</h1>
                            <p class="text-lg mb-4">{{ \Illuminate\Support\Str::limit($event->description, 150) }}</p>
                            <div class="mb-4">
                                <p class="font-bold">When:</p>
                                <p>{{ $event->date }}</p>
                            </div>
                            <div class="mb-4">
                                <p class="font-bold">Where:</p>
                                <p>{{ $event->location }}</p>
                            </div>
                            <!-- Additional details here -->
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</x-organizer-layout>