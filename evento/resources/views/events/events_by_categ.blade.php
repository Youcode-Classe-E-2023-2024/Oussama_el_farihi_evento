<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - {{ $category->name }} Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../style.css" />
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
    <!-- Navigation -->
  <nav class="fixed flex justify-between py-6 w-full lg:px-48 md:px-12 px-4 content-center bg-secondary z-10">
    <div class="flex items-center">
      <img src='images/evento.png' alt="Logo" class="h-4" />
    </div>
    <ul class="font-montserrat items-center hidden md:flex">
      <li class="mx-3 ">
        <a class="growing-underline" href="#categories">
          Categories
        </a>
      </li>
      <li class="growing-underline mx-3">
        <a href="#events">Events</a>
      </li>
      <li class="growing-underline mx-3">
        <a href="pricing">Pricing</a>
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
    <section class="pt-24 md:mt-0 flex flex-col justify-center md:flex-row md:justify-between md:items-center lg:px-48 md:px-12 px-4 bg-secondary">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Events in "{{ $category->name }}" Category</h2>
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
                            <!-- Icons and text for date, city, and place as in the original document -->
                            <span class="inline-block bg-primary rounded-full px-3 py-1 text-sm font-semibold text-black mr-2 mb-2">
                                #{{ $event->category?->name ?? 'Uncategorized' }}
                            </span>
                            <a href="{{ route('events.index', $event->id) }}" class="inline-flex items-center justify-center bg-primary rounded-full px-4 py-2 text-sm font-semibold text-black hover:bg-primary-dark transition-colors duration-200">
                                Learn More
                                <!-- Optional: SVG Arrow Icon Here -->
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
  <section class="bg-black sectionSize">
    <div class="mb-4">
      <img src='images\evento.png' alt="Logo" class="h-4" />
    </div>
    <div class="flex mb-8">
      <a href="#">
        <img src='assets/logos/Facebook.svg' alt="Facebook logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='assets/logos/Youtube.svg' alt="Youtube logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='assets/logos/Instagram.svg' alt="Instagram logo" class="mx-4" />
      </a>
      <a href="#">
        <img src='assets/logos/Twitter.svg' alt="Twitter logo" class="mx-4" />
      </a>
    </div>
    <div class="text-white font-montserrat text-sm">
      © 2021 EVENTO. All rights reserved
    </div>
  </section>
</body>
</html>
