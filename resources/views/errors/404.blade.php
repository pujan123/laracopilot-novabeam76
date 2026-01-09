<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Business Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        .error-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .error-card { background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); }
        .animate-float { animation: float 3s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-10px); } }
        .animate-fade-in { animation: fadeIn 0.8s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="error-bg min-h-screen flex items-center justify-center p-4">
    <div class="error-card max-w-2xl w-full rounded-3xl shadow-2xl p-8 md:p-12 text-center animate-fade-in">
        <div class="animate-float mb-8">
            <div class="w-32 h-32 mx-auto bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center shadow-2xl">
                <i class="fas fa-exclamation-triangle text-6xl text-white"></i>
            </div>
        </div>
        
        <h1 class="text-6xl md:text-8xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-4">
            404
        </h1>
        
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
            Page Not Found
        </h2>
        
        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
            Oops! The page you're looking for doesn't exist. It might have been moved, deleted, or you entered the wrong URL.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-home mr-2"></i>Back to Home
            </a>
            <button onclick="history.back()" class="border-2 border-indigo-600 text-indigo-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-indigo-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                <i class="fas fa-arrow-left mr-2"></i>Go Back
            </button>
        </div>
        
        <div class="mt-8 p-6 bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Quick Links</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                <a href="{{ route('home') }}#services" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors duration-300">
                    <i class="fas fa-cogs mr-1"></i>Services
                </a>
                <a href="{{ route('home') }}#about" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors duration-300">
                    <i class="fas fa-info-circle mr-1"></i>About
                </a>
                <a href="{{ route('home') }}#contact" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors duration-300">
                    <i class="fas fa-envelope mr-1"></i>Contact
                </a>
                <a href="{{ route('admin.login') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium transition-colors duration-300">
                    <i class="fas fa-user-shield mr-1"></i>Admin
                </a>
            </div>
        </div>
    </div>
</body>
</html>