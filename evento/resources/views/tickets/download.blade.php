<!DOCTYPE html>
<html>
<head>
    <title>Ticket</title>
</head>
<body>
    <h1>Ticket for {{ $event->title }}</h1>
    <p>Event Date: {{ $event->date->format('d M Y') }}</p>
    <p>Location: {{ $event->location }}</p>
    <p>Holder: {{ $user->name }}</p>
</body>
</html>
