<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Evento - Event Details</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
</head>
<body class="bg-secondary text-gray-900 font-montserrat">
    <!-- Navigation -->
    <nav class="fixed flex justify-between items-center py-4 w-full px-4 bg-secondary z-50">
        <img src="../assets/Logo_black.svg" alt="Logo" class="h-8">
        <div class="hidden md:flex space-x-4">
            <a href="howitworks" class="text-white hover:text-gray-300">How it works</a>
            <a href="features" class="text-white hover:text-gray-300">Features</a>
            <a href="pricing" class="text-white hover:text-gray-300">Pricing</a>
        </div>
        <!-- Authentication Links -->
        <div class="hidden md:flex space-x-4">
            <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Log in</a>
            <a href="{{ route('register') }}" class="bg-white text-black px-4 py-2 rounded-lg">Register</a>
        </div>
        <div class="md:hidden">
            <img src="../assets/logos/Menu.svg" alt="Menu icon">
        </div>
    </nav>

    
<!-- Hero Section -->
<section class="pt-24 bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" class="w-full h-48 object-cover">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-2">{{ $event->title }}</h1>
                <p class="mb-4 text-gray-600">{{ $event->description }}</p>
                <div class="flex items-center mb-2">
                    <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span>{{ $event->date->format('d M Y') }}</span>
                </div>
                <div class="flex items-center mb-2">
                    <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 21v-2a4 4 0 014-4h10a4 4 0 014 4v2m-3-10a4 4 0 11-8 0 4 4 0 018 0zM3 7h18M4 11v-6a1 1 0 011-1h14a1 1 0 011 1v6m-5 4h3"></path>
                    </svg>
                    <span>{{ $event->location }}</span>
                </div>
                <div class="flex items-center mb-4">
                    <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>{{ $event->category->name ?? 'N/A' }}</span>
                </div>
                <div class="flex items-center mb-4">
                    <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span>{{ $event->available_spots }} spots available</span>
                </div>
                <form action="{{ route('events.book', $event->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Reserve Now
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if(session('info'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Heads up!</strong>
        <span class="block sm:inline">{{ session('info') }}</span>
    </div>
@endif
@if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        <p class="font-bold">Error</p>
        <p>{{ session('error') }}</p>
    </div>
@endif




    <!-- Footer -->
    <footer class="bg-black py-8 mt-12">
        <div class="container mx-auto text-center">
            <img src="../assets/Logo_white.svg" alt="Logo" class="h-6 mx-auto mb-4">
            <div class="flex justify-center space-x-4 mb-4">
                <a href="#"><img src="../assets/logos/Facebook.svg" alt="Facebook logo"></a>
                <a href="#"><img src="../assets/logos/Youtube.svg" alt="Youtube logo"></a>
                <a href="#"><img src="../assets/logos/Instagram.svg" alt="Instagram logo"></a>
                <a href="#"><img src="../assets/logos/Twitter.svg" alt="Twitter logo"></a>
            </div>
            <p class="text-white text-sm">© 2021 STARTUP. All rights reserved</p>
        </div>
    </footer>
</body>
</html>
