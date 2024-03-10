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
  <nav class="fixed flex justify-between py-6 w-full lg:px-48 md:px-12 px-4 content-center bg-secondary z-10">
    <div class="flex items-center">
    <a href="http://127.0.0.1:8000">
      <img src='{{ asset('images\evento.png') }}' alt="Logo" class="h-4" /></a>
    </div>
    <ul class="font-montserrat items-center hidden md:flex">
      <li class="mx-3 ">
        <a class="growing-underline" href="http://127.0.0.1:8000/#categories">
          Categories
        </a>
      </li>
      <li class="growing-underline mx-3">
        <a href="http://127.0.0.1:8000/#events">Events</a>
      </li>
      <li class="growing-underline mx-3">
        <a href="http://127.0.0.1:8000/#pricing">Pricing</a>
      </li>
      <li class="growing-underline mx-3">
        <a href="{{ route('user.bookings') }}">Booking status</a>
      </li>
    </ul>
    @if (Route::has('login'))
                <div class="font-montserrat hidden md:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="mr-6">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="py-2 px-4 text-white bg-black rounded-3xl">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    <div id="showMenu" class="md:hidden">
      <img src='assets/logos/Menu.svg' alt="Menu icon" />
    </div>
  </nav>
  <div id='mobileNav' class="hidden px-4 py-6 fixed top-0 left-0 h-full w-full bg-secondary z-20 animate-fade-in-down">
    <div id="hideMenu" class="flex justify-end">
      <img src='assets/logos/Cross.svg' alt="" class="h-16 w-16" />
    </div>
    <ul class="font-montserrat flex flex-col mx-8 my-24 items-center text-3xl">
      <li class="my-6">
        <a href="categories">Categories</a>
      </li>
      <li class="my-6">
        <a href="events">Events</a>
      </li>
      <li class="my-6">
        <a href="pricing">Pricing</a>
      </li>
    </ul>
  </div>

    
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
  <section class="bg-black sectionSize">
    <div class="mb-4">
      <img src='..\images\evento.png' alt="Logo" class="h-4" />
    </div>
    <div class="flex mb-8">
      <a href="#">
        <img src='..\assets/logos/Facebook.svg' alt="Facebook logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='..\assets/logos/Youtube.svg' alt="Youtube logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='..\assets/logos/Instagram.svg' alt="Instagram logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='..\assets/logos/Twitter.svg' alt="Twitter logo" class="mx-4" />
      </a>
    </div>
    <div class="text-white font-montserrat text-sm">
      © 2021 EVENTO. All rights reserved
    </div>
  </section>
</body>
</html>
