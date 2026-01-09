@extends('layouts.app')

@section('title', 'Dashboard - Laravel Quiz Assessment')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Welcome back, {{ session('user')['name'] }}!</h1>
            <p class="text-gray-600 mt-2">Track your Laravel learning progress and continue improving your skills.</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl card-shadow hover:shadow-lg transition duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clipboard-list text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['total_quizzes'] }}</p>
                        <p class="text-gray-600 text-sm">Total Quizzes</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl card-shadow hover:shadow-lg transition duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['completed_quizzes'] }}</p>
                        <p class="text-gray-600 text-sm">Completed</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl card-shadow hover:shadow-lg transition duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-percentage text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['average_score'] }}%</p>
                        <p class="text-gray-600 text-sm">Average Score</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl card-shadow hover:shadow-lg transition duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-trophy text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['best_score'] }}%</p>
                        <p class="text-gray-600 text-sm">Best Score</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl card-shadow hover:shadow-lg transition duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['time_spent'] }}</p>
                        <p class="text-gray-600 text-sm">Time Spent</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl card-shadow hover:shadow-lg transition duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-medal text-white text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-2xl font-bold text-gray-900">{{ $stats['rank'] }}</p>
                        <p class="text-gray-600 text-sm">Current Rank</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Quick Actions -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Quick Actions</h2>
                    <div class="space-y-4">
                        <a href="{{ route('quiz.index') }}" class="block w-full btn-gradient text-white py-3 px-4 rounded-lg font-semibold text-center hover:shadow-lg transition duration-300 transform hover:scale-105">
                            <i class="fas fa-brain mr-2"></i> Take New Quiz
                        </a>
                        <button onclick="alert('Feature coming soon!')" class="block w-full bg-gray-100 text-gray-700 py-3 px-4 rounded-lg font-semibold text-center hover:bg-gray-200 transition duration-300">
                            <i class="fas fa-chart-line mr-2"></i> View Analytics
                        </button>
                        <button onclick="alert('Feature coming soon!')" class="block w-full bg-gray-100 text-gray-700 py-3 px-4 rounded-lg font-semibold text-center hover:bg-gray-200 transition duration-300">
                            <i class="fas fa-book mr-2"></i> Study Materials
                        </button>
                    </div>
                </div>

                <!-- Progress Chart -->
                <div class="bg-white rounded-xl card-shadow p-6 mt-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Progress Overview</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Laravel Basics</span>
                                <span>90%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-400 to-green-600 h-2 rounded-full" style="width: 90%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Eloquent ORM</span>
                                <span>75%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Advanced Topics</span>
                                <span>60%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-yellow-400 to-orange-600 h-2 rounded-full" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Quizzes -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl card-shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Recent Quiz Activity</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Quiz Title</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Score</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Date</th>
                                    <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentQuizzes as $quiz)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-200">
                                    <td class="py-4 px-4">
                                        <div class="font-medium text-gray-900">{{ $quiz['title'] }}</div>
                                    </td>
                                    <td class="py-4 px-4">
                                        @if($quiz['status'] === 'Completed')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                @if($quiz['score'] >= 90) bg-green-100 text-green-800
                                                @elseif($quiz['score'] >= 70) bg-blue-100 text-blue-800
                                                @else bg-yellow-100 text-yellow-800
                                                @endif">
                                                {{ $quiz['score'] }}%
                                            </span>
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-gray-600">
                                        {{ $quiz['date'] ? date('M j, Y', strtotime($quiz['date'])) : '-' }}
                                    </td>
                                    <td class="py-4 px-4">
                                        @if($quiz['status'] === 'Completed')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                <i class="fas fa-check mr-1"></i> Completed
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                <i class="fas fa-play mr-1"></i> Available
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection