@extends('layouts.admin')

@section('title', 'Analytics - Business Solutions Admin')
@section('page-title', 'Analytics & Insights')

@section('content')
<div class="space-y-8">
    <!-- Analytics Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($data['metrics'] as $metric)
        <div class="admin-card p-6 rounded-2xl shadow-lg card-hover border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ $metric['title'] }}</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $metric['value'] }}</p>
                    <p class="text-sm text-green-600 mt-1">
                        <i class="fas fa-arrow-up mr-1"></i>{{ $metric['change'] }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-bar text-white"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Traffic Sources -->
        <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6">Traffic Sources</h3>
            <div style="width: 100%; height: 300px;">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>

        <!-- User Engagement -->
        <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6">User Engagement</h3>
            <div style="width: 100%; height: 300px;">
                <canvas id="engagementChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Detailed Analytics -->
    <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Website Performance</h3>
        <div style="width: 100%; height: 400px;">
            <canvas id="performanceChart"></canvas>
        </div>
    </div>

    <!-- Top Pages -->
    <div class="admin-card rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-xl font-bold text-gray-800">Top Performing Pages</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-gray-800">/services</h4>
                        <p class="text-sm text-gray-600">Business Services Page</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-800">12,847 views</p>
                        <p class="text-sm text-green-600">+18.2%</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-gray-800">/</h4>
                        <p class="text-sm text-gray-600">Homepage</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-800">8,943 views</p>
                        <p class="text-sm text-green-600">+12.5%</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-gray-800">/about</h4>
                        <p class="text-sm text-gray-600">About Us Page</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-800">5,672 views</p>
                        <p class="text-sm text-green-600">+8.7%</p>
                    </div>
                </div>
                
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                    <div>
                        <h4 class="font-medium text-gray-800">/contact</h4>
                        <p class="text-sm text-gray-600">Contact Page</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-800">3,421 views</p>
                        <p class="text-sm text-green-600">+15.3%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Traffic Sources Chart
    const trafficCtx = document.getElementById('trafficChart').getContext('2d');
    new Chart(trafficCtx, {
        type: 'doughnut',
        data: {
            labels: ['Organic Search', 'Direct', 'Social Media', 'Referral'],
            datasets: [{
                data: [45, 30, 15, 10],
                backgroundColor: [
                    'rgba(102, 126, 234, 0.8)',
                    'rgba(118, 75, 162, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(251, 146, 60, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // User Engagement Chart
    const engagementCtx = document.getElementById('engagementChart').getContext('2d');
    new Chart(engagementCtx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Sessions',
                data: [120, 190, 150, 250, 220, 180, 160],
                backgroundColor: 'rgba(102, 126, 234, 0.8)',
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Performance Chart
    const performanceCtx = document.getElementById('performanceChart').getContext('2d');
    new Chart(performanceCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Page Views',
                data: [1200, 1900, 1500, 2500, 2200, 3000, 2800, 3200, 2900, 3500, 3300, 3800],
                borderColor: 'rgb(102, 126, 234)',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Unique Visitors',
                data: [800, 1200, 1000, 1600, 1400, 1800, 1700, 2000, 1800, 2200, 2000, 2400],
                borderColor: 'rgb(118, 75, 162)',
                backgroundColor: 'rgba(118, 75, 162, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
@endsection