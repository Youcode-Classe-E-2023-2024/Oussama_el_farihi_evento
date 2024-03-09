<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - {{ $category->name }} Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
    <!-- Navigation -->
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-lg font-semibold">Evento</a>
            <div class="hidden md:flex space-x-4">
                <a href="howitworks" class="hover:text-gray-400">How it works</a>
                <a href="features" class="hover:text-gray-400">Features</a>
                <a href="pricing" class="hover:text-gray-400">Pricing</a>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="{{ route('login') }}" class="hover:text-gray-400">Log in</a>
                <a href="{{ route('register') }}" class="bg-gray-700 px-3 py-1 rounded">Register</a>
            </div>
        </div>
    </nav>

    <!-- Category Events Section -->
    <section class="py-12 bg-gray-200">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Events in "{{ $category->name }}" Category</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($events as $event)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->name }}">
                    <div class="p-6">
                        <h3 class="font-bold text-xl text-gray-800 mb-3">{{ $event->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($event->description, 100) }}</p>
                        <div class="text-sm mb-2"><span class="font-bold">Date:</span> {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</div>
                        <div class="text-sm mb-2"><span class="font-bold">Place:</span> {{ $event->place_number }}</div>
                        <div class="text-sm mb-4"><span class="font-bold">City:</span> {{ $event->city }}</div>
                        <span class="inline-block bg-primary-200 text-primary-800 rounded-full px-3 py-1 text-sm font-semibold mb-2">
                            #{{ $event->category?->name ?? 'Uncategorized' }}
                        </span>
                        <a href="{{ route('events.index', $event->id) }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                            Learn More
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto text-center">
            <p>© 2021 Evento. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
