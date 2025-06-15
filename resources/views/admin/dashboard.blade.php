<x-layout>
    <x-slot:title>Dashboard</x-slot:title>
    <div class="flex gap-4">
        <aside class="buscar:w-[25%]">
            <x-admin.sidebar />
        </aside>
        <aside class="lg:w-[75%] lg:right-0 absolute p-6 bg-shark-50 ">
            <!-- Statistics Dashboard -->
            <h1 class="text-2xl font-bold mb-6">Rental Statistics</h1>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-shark-100 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4">
                        <i class='bx bxs-car text-3xl text-blue-400'></i>
                        <div>
                            <h3 class="text-lg font-semibold">Total Vehicles</h3>
                            <p class="text-2xl font-bold">{{ $totalVehicles ?? 150 }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-shark-100 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4">
                        <i class='bx bxs-user text-3xl text-green-400'></i>
                        <div>
                            <h3 class="text-lg font-semibold">Active Rentals</h3>
                            <p class="text-2xl font-bold">{{ $activeRentals ?? 45 }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-shark-100 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4">
                        <i class='bx bxs-dollar-circle text-3xl text-yellow-400'></i>
                        <div>
                            <h3 class="text-lg font-semibold">Total Revenue</h3>
                            <p class="text-2xl font-bold">${{ number_format($totalRevenue ?? 12500, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-shark-100 p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-4">
                        <i class='bx bxs-star text-3xl text-red-400'></i>
                        <div>
                            <h3 class="text-lg font-semibold">Customer Rating</h3>
                            <p class="text-2xl font-bold">{{ $averageRating ?? 4.8 }}/5</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="bg-shark-100 p-6 rounded-lg shadow-sm mb-8">
                <h2 class="text-xl font-semibold mb-4">Rental Trends</h2>
                <canvas id="rentalChart" class="w-full h-96"></canvas>
            </div>

            <!-- Recent Activity -->
            <div class="bg-shark-100 p-6 rounded-lg shadow-sm">
                <h2 md="text-xl font-semibold mb-4">Recent Activity</h2>
                <ul class="space-y-4">
                    @foreach ($recentActivities ?? [] as $activity)
                        <li class="flex items-center gap-4">
                            <i class='bx bx-time-five text-2xl text-blue-400'></i>
                            <div>
                                <p class="font-semibold">{{ $activity['description'] }}</p>
                                <p class="text-sm text-gray-400">{{ $activity['date'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>

    <!-- Include Chart.js and Boxicons -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script>
        // Chart.js Configuration
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('rentalChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Rental Bookings',
                        data: [65, 59, 80, 81, 56, 55],
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        fill: true,
                        tension: 0.4
                    }, {
                        label: 'Revenue ($)',
                        data: [2800, 4800, 4000, 6900, 12000, 8000],
                        borderColor: '#F59E0B',
                        backgroundColor: 'rgba(245, 158, 11, 0.2)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: '#222831'
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: { color: '#222831' },
                            grid: { color: '#aebccb' }
                        },
                        y: {
                            ticks: { color: '#222831' },
                            grid: { color: '#aebccb' }
                        }
                    }
                }
            });
        });
    </script>
</x-layout>