<x-admin-layout>
    <div class="py-12">
        <h1>Site Statistics</h1>
        <ul>
            <li>Total Users: {{ $totalUsers }}</li>
            <li>Total Events: {{ $totalEvents }}</li>
        </ul>
        <canvas id="userChart"></canvas>
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
                }
            }
        });
    </script>
</x-admin-layout>
