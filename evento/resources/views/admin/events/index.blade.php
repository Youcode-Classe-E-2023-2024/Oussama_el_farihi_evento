<x-admin-layout>
@foreach($events as $event)
    <div>
        <p>{{ $event->title }}</p>
        <!-- Display event details -->
        <form action="{{ route('admin.events.approve', $event->id) }}" method="POST">
            @csrf
            <button type="submit">Approve</button>
        </form>
    </div>
@endforeach
</x-admin-layout>
