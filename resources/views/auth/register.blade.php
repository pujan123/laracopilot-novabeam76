@extends('layouts.app')

@section('title', 'Register - Laravel Quiz Assessment')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <i class="fas fa-user-plus text-6xl text-purple-600 mb-4"></i>
            <h2 class="text-3xl font-bold text-gray-900">Create your account</h2>
            <p class="mt-2 text-gray-600">Start your Laravel learning journey</p>
        </div>

        <form action="/register" method="POST" class="mt-8 space-y-6">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                    <input id="name" name="name" type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" placeholder="Enter your full name">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input id="email" name="email" type="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" placeholder="Enter your email">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input id="password" name="password" type="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" placeholder="Create a password">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-300" placeholder="Confirm your password">
                </div>
            </div>

            <div>
                <button type="submit" class="w-full btn-gradient text-white py-3 px-4 rounded-lg font-semibold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <i class="fas fa-user-plus mr-2"></i> Create Account
                </button>
            </div>

            <div class="text-center">
                <p class="text-gray-600">Already have an account? 
                    <a href="{{ route('login') }}" class="text-purple-600 hover:text-purple-800 font-semibold">Sign in here</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection