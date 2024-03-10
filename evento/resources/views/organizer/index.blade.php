<x-organizer-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Event Statistics</h1>
                    <p class="mt-1 text-lg text-gray-600 dark:text-gray-400">Overview of event booking statistics.</p>
                </div>

                <div class="bg-blue-100 dark:bg-blue-900 p-5 rounded-lg mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Summary</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Total Bookings: {{ $totalBookings }}</p>
                    @if($mostReservedEvent)
                        <p class="text-lg text-gray-600 dark:text-gray-300">Most Reserved Event: {{ $mostReservedEvent->title }} with {{ $mostReservedEvent->bookings_count }} bookings</p>
                    @endif
                </div>

                <div>
                    <canvas id="eventsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('eventsChart').getContext('2d');
        var eventsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! $events->pluck('title')->toJson() !!},
                datasets: [{
                    label: 'Number of Bookings',
                    data: {!! $events->pluck('bookings_count')->toJson() !!},
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-organizer-layout>
