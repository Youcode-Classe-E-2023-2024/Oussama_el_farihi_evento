<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - {{ $category->name }} Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}" />

</head>
<body class="bg-gray-100 text-gray-900 font-sans">
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
  
    <!-- Category Events Section -->
    <section class="pt-24 md:mt-0 flex flex-col justify-center md:flex-row md:justify-between md:items-center lg:px-48 md:px-12 px-4 bg-secondary mb-10">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">{{ $category->name }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($events as $event)
      <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
        <img class="w-full" src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="height: 160px; object-fit: cover;">
        <div class="p-6">
          <h3 class="font-bold text-xl mb-2">{{ $event->name }}</h3>
          <p class="text-gray-700 text-base mb-4">
            {{ Str::limit($event->description, 100) }}
          </p>
          <div class="flex items-center text-gray-600 text-sm mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Date: {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
          </div>
          <div class="flex items-center text-gray-600 text-sm mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z" />
            </svg>
            City: {{ $event->location }}
          </div>
          <div class="text-gray-600 text-sm mb-4">Place: {{ $event->available_spots }}</div>
          <span class="inline-block bg-primary rounded-full px-3 py-1 text-sm font-semibold text-black mr-2 mb-2">
            #{{ $event->category?->name ?? 'Uncategorized' }}
          </span>
          <a href="{{ route('events.index', $event->id) }}" class="inline-flex items-center justify-center bg-primary rounded-full px-4 py-2 text-sm font-semibold text-black hover:bg-primary-dark transition-colors duration-200">
            Learn More
            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L15.586 11H3a1 1 0 110-2h12.586l-5.293-5.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
          </a>
        </div>
      </div>
      @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
  <section class="bg-black sectionSize">
    <div class="mb-4">
      <img src='{{ asset('images\evento.png') }}' alt="Logo" class="h-4" />
    </div>
    <div class="flex mb-8">
      <a href="#">
        <img src='{{ asset('assets\logos\Facebook.svg') }}' alt="Facebook logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='{{ asset('assets/logos/Youtube.svg') }}' alt="Youtube logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='{{ asset('assets/logos/Instagram.svg') }}' alt="Instagram logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='{{ asset('assets/logos/Twitter.svg') }}' alt="Twitter logo" class="mx-4" />
      </a>
    </div>
    <div class="text-white font-montserrat text-sm">
      © 2021 EVENTO. All rights reserved
    </div>
  </section>
</body>
</html>
