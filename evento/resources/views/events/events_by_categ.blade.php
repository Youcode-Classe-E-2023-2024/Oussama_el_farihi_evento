<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} Events - Evento</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navigation (You can include your existing navigation here) -->

    <!-- Category Events Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-semibold mb-6">Events in "{{ $category->name }}" Category</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($events as $event)
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 p-4">
                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
                        <div class="p-4">
                            <h3 class="font-bold text-xl mb-2">{{ $event->title }}</h3>
                            <p class="text-gray-700 text-base mb-4">{{ Str::limit($event->description, 100) }}</p>
                            <p class="text-gray-600 text-sm mb-2">Date: {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
                            <p class="text-gray-600 text-sm">Location: {{ $event->location }}</p>
                            <a href="#" class="inline-block bg-primary rounded-full px-3 py-1 text-sm font-semibold text-white mt-4">Learn More</a>
                        </div>
                    </div>
                @empty
                    <p>No events found in this category.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer (You can include your existing footer here) -->
</body>
</html>
