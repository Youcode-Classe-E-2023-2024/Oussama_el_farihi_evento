<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Evento</title>
  <link rel="stylesheet" href="style.css" />
  <script src="script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <!-- Navigation -->
  <nav class="fixed flex justify-between py-6 w-full lg:px-48 md:px-12 px-4 content-center bg-secondary z-10">
    <div class="flex items-center">
      <img src='images\evento.png' alt="Logo" class="h-4" />
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


  <div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Your Bookings</h1>
    @forelse ($bookings as $booking)
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-md mb-4">
            <div class="p-6">
                <h5 class="text-lg font-bold text-gray-900">{{ $booking->event->title }}</h5>
                <h6 class="text-sm font-medium text-gray-600 mb-2">Date: {{ $booking->event->date->format('F d, Y') }}</h6>
                <p class="text-sm text-gray-800 mb-4">Status: <span class="{{ $booking->is_approved ? 'text-green-500' : 'text-yellow-500' }}">{{ $booking->is_approved ? 'Approved' : 'Pending' }}</span></p>
                @if ($booking->is_approved)
                <a href="{{ route('bookings.download-ticket', $booking->id) }}" class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Download Ticket
</a>

                @endif
            </div>
        </div>
    @empty
        <p class="text-center text-gray-500">You have no bookings.</p>
    @endforelse
</div>



</html>