<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 space-y-8">
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white">Site Statistics</h1>
                    <p class="mt-1 text-lg text-gray-600 dark:text-gray-400">A quick overview of site activity.</p>
                </div>

                <div class="bg-blue-100 dark:bg-blue-900 p-5 rounded-lg mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Summary</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Total Users: {{ $totalUsers }}</p>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Total Events: {{ $totalEvents }}</p>
                </div>

                <div>
                    <canvas id="userChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('userChart').getContext('2d');
        var userChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Users', 'Total Events'],
                datasets: [{
                    label: '# of Entries',
                    data: [{{ $totalUsers }}, {{ $totalEvents }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
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
</x-admin-layout>
