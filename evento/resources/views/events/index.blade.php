<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Details</title>
</head>
<body>
    <h1>{{ $event->title }}</h1>
    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image">
    <p>{{ $event->description }}</p>
    <p>Date: {{ $event->date->format('d M Y') }}</p>
    <p>Location: {{ $event->location }}</p>
    <!-- Add more details as needed -->
</body>
</html>
