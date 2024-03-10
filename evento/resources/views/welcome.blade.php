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
      <img src='assets/Logo_black.svg' alt="Logo" class="h-4" />
    </div>
    <ul class="font-montserrat items-center hidden md:flex">
      <li class="mx-3 ">
        <a class="growing-underline" href="howitworks">
          How it works
        </a>
      </li>
      <li class="growing-underline mx-3">
        <a href="features">Features</a>
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
        <a href="howitworks">How it works</a>
      </li>
      <li class="my-6">
        <a href="features">Features</a>
      </li>
      <li class="my-6">
        <a href="pricing">Pricing</a>
      </li>
    </ul>
  </div>

  <!-- Hero -->
  <section
    class="pt-24 md:mt-0 md:h-screen flex flex-col justify-center text-center md:text-left md:flex-row md:justify-between md:items-center lg:px-48 md:px-12 px-4 bg-secondary">
    <div class="md:flex-1 md:mr-10">
      <h1 class="font-pt-serif text-5xl font-bold mb-7">
        A headline for your
        <span class="bg-underline1 bg-left-bottom bg-no-repeat pb-2 bg-100%">
          cool website
        </span>
      </h1>
      <p class="font-pt-serif font-normal mb-7">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum harum
        tempore consectetur voluptas, cumque nobis laboriosam voluptatem.
      </p>
      <div class="font-montserrat">
        <button class="bg-black px-6 py-4 rounded-lg border-2 border-black border-solid text-white mr-2 mb-2">
          Call to action
        </button>
        <button class="px-6 py-4 border-2 border-black border-solid rounded-lg">
          Secondary action
        </button>
      </div>
    </div>
    <div class="flex justify-around md:block mt-8 md:mt-0 md:flex-1">
      <div class="relative">
        <img src='assets/Highlight1.svg' alt="" class="absolute -top-16 -left-10" />
      </div>
      <img src='assets/MacBook Pro.png' alt="Macbook" />
      <div class="relative">
        <img src='assets/Highlight2.svg' alt="" class="absolute -bottom-10 -right-6" />
      </div>
    </div>
  </section>

  <!-- Categories Section -->
  <section class="bg-black text-white sectionSize">
    <div>
        <h2 class="secondaryTitle bg-underline2 bg-100%">Categories</h2>
    </div>
    <div class="flex flex-wrap justify-center md:flex-row">
        @foreach ($categories as $category)
            <div class="flex-1 mx-8 flex flex-col items-center my-4 text-center">
            <a href="{{ route('events.events_by_categ', $category->id) }}" class="border-2 rounded-full bg-secondary text-black h-12 w-12 flex justify-center items-center mb-3">
                    <span class="font-bold text-xl">{{ strtoupper($category->name[0]) }}</span>
                </a>
                <h3 class="font-montserrat font-medium text-xl mb-2">{{ $category->name }}</h3>
            </div>
        @endforeach
    </div>
</section>



<!-- Features Section -->
<!-- Search Bar -->
<div class="text-center mt-8">
  <input type="text" id="search" placeholder="Search events by title..." class="px-4 py-2 border-2 border-gray-300 rounded-lg">
  <button id="searchButton" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Search</button>
</div>

<!-- Search Results Container -->
<div id="searchResults"></div>

<section class="py-12 bg-secondary">
  <div class="text-center">
    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-8">Events</h2>
  </div>
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($events as $event)
      <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
        <img class="w-full" src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="height: 160px; object-fit: cover;">
        <div class="p-6">
          <h3 class="font-bold text-xl mb-2">{{ $event->name }}</h3>
          <p class="text-gray-700 text-base mb-4">
            {{ Str::limit($event->description, 100) }}
          </p>
          <div class="text-gray-600 text-sm mb-2">Date: {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</div>
          <div class="text-gray-600 text-sm mb-2">Place: {{ $event->place_number }}</div>
          <div class="text-gray-600 text-sm mb-4">City: {{ $event->city }}</div>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
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
    <div class="mt-8">
      {{ $events->links() }}
    </div>
  </section>



  <!-- Pricing -->
  <section class="sectionSize bg-secondary py-0">
    <div>
      <h2 class="secondaryTitle bg-underline4 mb-0 bg-100%">Pricing</h2>
    </div>
    <div class="flex w-full flex-col md:flex-row">

      <div class='flex-1 flex flex-col mx-6 shadow-2xl relative bg-secondary rounded-2xl py-5 px-8 my-8 md:top-24'>
        <h3 class="font-pt-serif font-normal text-2xl mb-4">
          The Good
        </h3>
        <div class="font-montserrat font-bold text-2xl mb-4">
          $25
          <span class="font-normal text-base"> / month</span>
        </div>

        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #1</p>
        </div>
        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #2</p>
        </div>
        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #3</p>
        </div>

        <button class=" border-2 border-solid border-black rounded-xl text-lg py-3 mt-4">
          Choose plan
        </button>
      </div>

      <div class='flex-1 flex flex-col mx-6 shadow-2xl relative bg-secondary rounded-2xl py-5 px-8 my-8 md:top-12'>
        <h3 class="font-pt-serif font-normal text-2xl mb-4">
          The Bad
        </h3>
        <div class="font-montserrat font-bold text-2xl mb-4">
          $40
          <span class="font-normal text-base"> / month</span>
        </div>

        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #1</p>
        </div>
        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #2</p>
        </div>
        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #3</p>
        </div>

        <button class=" border-2 border-solid border-black rounded-xl text-lg py-3 mt-4">
          Choose plan
        </button>
      </div>

      <div class='flex-1 flex flex-col mx-6 shadow-2xl relative bg-secondary rounded-2xl py-5 px-8 my-8 md:top-24'>
        <h3 class="font-pt-serif font-normal text-2xl mb-4">
          The Ugly
        </h3>
        <div class="font-montserrat font-bold text-2xl mb-4">
          $50
          <span class="font-normal text-base"> / month</span>
        </div>

        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #1</p>
        </div>
        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #2</p>
        </div>
        <div class="flex">
          <img src='assets/logos/CheckedBox.svg' alt="" class="mr-1" />
          <p>Benefit #3</p>
        </div>

        <button class=" border-2 border-solid border-black rounded-xl text-lg py-3 mt-4">
          Choose plan
        </button>
      </div>

    </div>
  </section>

  <!-- FAQ  -->
  <section class="sectionSize items-start pt-8 md:pt-36 bg-black text-white">
    <div>
      <h2 class="secondaryTitle bg-highlight3 p-10 mb-0 bg-center bg-100%">
        FAQ
      </h2>
    </div>

    <div toggleElement class="w-full py-4">
      <div class="flex justify-between items-center">
        <div question class="font-montserrat font-medium mr-auto">
          Where can I get this HTML template?
        </div>
        <img src='assets/logos/CaretRight.svg' alt="" class="transform transition-transform" />
      </div>
      <div answer class="font-montserrat text-sm font-extralight pb-8 hidden">
        You can download it on Gumroad.com
      </div>
    </div>
    <hr class="w-full bg-white" />

    <div toggleElement class="w-full py-4">
      <div class="flex justify-between items-center">
        <div question class="font-montserrat font-medium mr-auto">
          Is this HTML template free?
        </div>
        <img src='assets/logos/CaretRight.svg' alt="" class="transform transition-transform" />
      </div>
      <div answer class="font-montserrat text-sm font-extralight pb-8 hidden">
        Yes! For you it is free.
      </div>
    </div>
    <hr class="w-full bg-white" />

    <div toggleElement class="w-full py-4">
      <div class="flex justify-between items-center">
        <div question class="font-montserrat font-medium mr-auto">
          Am I awesome?
        </div>
        <img src='assets/logos/CaretRight.svg' alt="" class="transform transition-transform" />
      </div>
      <div answer class="font-montserrat text-sm font-extralight pb-8 hidden">
        Yes! No doubt about it.
      </div>
    </div>
    <hr class="w-full bg-white" />

  </section>

  <!-- Footer -->
  <section class="bg-black sectionSize">
    <div class="mb-4">
      <img src='assets/Logo_white.svg' alt="Logo" class="h-4" />
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
      © 2021 STARTUP. All rights reserved
    </div>
  </section>
</body>
<script>
$(document).ready(function() {
  $('#searchButton').click(function() {
    var query = $('#search').val();
    $.ajax({
      url: "{{ route('search-events') }}",
      type: "GET",
      data: { 'search': query },
      success: function(data) {
        $('#searchResults').html(data);
      }
    });
  });
});
</script>


</html>