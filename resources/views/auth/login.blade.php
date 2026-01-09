@extends('layouts.app')

@section('title', 'Login - Laravel Quiz Assessment')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <i class="fas fa-user-circle text-6xl text-purple-600 mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-900">Sign in to your account</h2>
            <p class="mt-2 text-gray-600">Access your Laravel quiz dashboard</p>
        </div>

        <!-- Demo Credentials -->
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h3 class="font-semibold text-blue-800 mb-2">Demo Credentials:</h3>
            <div class="text-sm text-blue-700 space-y-1">
                <p><strong>Email:</strong> john@laravel.com | <strong>Password:</strong> password123</p>
                <p><strong>Email:</strong> jane@laravel.com | <strong>Password:</strong> password123</p>
                <p><strong>Email:</strong> mike@laravel.com | <strong>Password:</strong> password123</p>
            </div>
        </div>

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                <div class="text-red-800">{{ session('error') }}</div>
            </div>
        @endif

        <form action="/login" method="POST" class="mt-8 space-y-6">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input id="email" name="email" type="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" placeholder="Enter your email" value="john@laravel.com">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input id="password" name="password" type="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" placeholder="Enter your password" value="password123">
                </div>
            </div>

            <div>
                <button type="submit" class="w-full btn-gradient text-white py-3 px-4 rounded-lg font-semibold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                </button>
            </div>

            <div class="text-center">
                <p class="text-gray-600">Don't have an account? 
                    <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 font-semibold">Sign up here</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection