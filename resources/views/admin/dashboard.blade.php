@extends('layouts.admin')

@section('title', 'Dashboard - Business Solutions Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-8">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($data['stats'] as $stat)
        <div class="admin-card p-6 rounded-2xl shadow-lg card-hover border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ $stat['title'] }}</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stat['value'] }}</p>
                    <p class="text-sm text-{{ $stat['color'] }}-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>{{ $stat['change'] }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-{{ $stat['color'] }}-500 to-{{ $stat['color'] }}-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-white"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Revenue Chart -->
        <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Revenue Overview</h3>
            <div style="width: 100%; height: 300px;">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Recent Orders</h3>
            <div class="space-y-4">
                @foreach($data['recent_orders'] as $order)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div>
                        <p class="font-medium text-gray-800">{{ $order['id'] }}</p>
                        <p class="text-sm text-gray-600">{{ $order['customer'] }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-800">{{ $order['amount'] }}</p>
                        <span class="px-3 py-1 text-xs rounded-full 
                            @if($order['status'] == 'Completed') bg-green-100 text-green-800
                            @elseif($order['status'] == 'Processing') bg-blue-100 text-blue-800
                            @elseif($order['status'] == 'Shipped') bg-purple-100 text-purple-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $order['status'] }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Sales Performance</h3>
        <div style="width: 100%; height: 400px;">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [12000, 19000, 15000, 25000, 22000, 30000],
                borderColor: 'rgb(102, 126, 234)',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'bar',
        data: {
            labels: ['Business Consulting', 'Digital Solutions', 'Analytics', 'Premium Support'],
            datasets: [{
                label: 'Sales',
                data: [65, 59, 80, 45],
                backgroundColor: [
                    'rgba(102, 126, 234, 0.8)',
                    'rgba(118, 75, 162, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(251, 146, 60, 0.8)'
                ],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
@endsection