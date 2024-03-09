<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Design</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            background-color: #fafafa;
            margin: 0;
            padding: 40px;
        }
        .ticket {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        .ticket::before {
            content: '';
            position: absolute;
            top: -2px; bottom: -2px;
            left: -2px; right: -2px;
            z-index: -1;
            background: linear-gradient(140deg, #007BFF, #8811AA);
            border-radius: 8px;
        }
        .ticket-header {
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 20px;
            text-align: center;
        }
        .ticket-header h1 {
            margin: 0;
            color: #333;
        }
        .ticket-info {
            margin-bottom: 20px;
        }
        .ticket-info h2 {
            color: #333;
            font-size: 1.2em;
            margin: 5px 0;
        }
        .barcode {
            text-align: center;
            margin-top: 20px;
        }
        .barcode img {
            max-width: 100%;
            height: auto;
        }
        .footer {
            text-align: center;
            font-size: 0.9em;
            color: #aaa;
        }
    </style>
</head>
<body>

<div class="ticket">
    <div class="ticket-header">
        <h1>{{ $event->title }}</h1>
    </div>
    <div class="ticket-info">
        <h2>Date: {{ $event->date->format('d M Y') }}</h2>
        <h2>Location: {{ $event->location }}</h2>
    </div>
    <div class="barcode">
        <!-- Placeholder for barcode image -->
        <img src="https://barcode.tec-it.com/barcode.ashx?data=ABC-1234" alt="Barcode" />
    </div>
    <div class="footer">
        <p>Thank you for your purchase mr.{{ $user->name }}!</p>
    </div>
</div>

</body>
</html>
