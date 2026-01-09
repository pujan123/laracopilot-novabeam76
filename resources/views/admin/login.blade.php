<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Business Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        .login-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .login-card { background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); }
        .animate-fade-in { animation: fadeIn 0.8s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="login-bg min-h-screen flex items-center justify-center p-4">
    <div class="login-card max-w-md w-full rounded-2xl shadow-2xl p-8 animate-fade-in">
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-rocket text-4xl text-indigo-600 mr-3"></i>
                <h1 class="text-3xl font-bold text-gray-800">Admin Login</h1>
            </div>
            <p class="text-gray-600">Access the Business Solutions admin panel</p>
        </div>

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
        @endif

        <form action="/admin/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-sign-in-alt mr-2"></i>Sign In
            </button>
        </form>

        <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200">
            <h3 class="text-sm font-semibold text-gray-700 mb-3">Demo Credentials:</h3>
            <div class="space-y-2 text-sm">
                @foreach($credentials as $cred)
                <div class="flex justify-between items-center p-2 bg-white rounded border">
                    <span class="font-medium text-gray-600">{{ $cred['role'] }}:</span>
                    <span class="text-gray-800">{{ $cred['email'] }} | {{ $cred['password'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Back to Website
            </a>
        </div>
    </div>
</body>
</html>