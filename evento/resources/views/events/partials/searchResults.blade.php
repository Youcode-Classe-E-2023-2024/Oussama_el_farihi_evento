
<div class="mt-4 max-w-md mx-auto">
  @foreach($events as $event)
    <div class="border-b border-gray-700 py-4">
      <h3 class="text-lg text-blue-700 font-semibold hover:underline">
        <a href="{{ route('events.index', $event->id) }}">{{ $event->title }}</a>
      </h3>
      <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
      <p class="text-gray-800 mt-1">{{ $event->description }}</p>
    </div>
  @endforeach
</div>
