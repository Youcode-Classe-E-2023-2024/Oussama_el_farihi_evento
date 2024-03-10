@foreach($events as $event)
  <div class="event">
    <h3>{{ $event->title }}</h3>
    <p>{{ $event->description }}</p>
  </div>
@endforeach