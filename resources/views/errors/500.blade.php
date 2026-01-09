<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error - Business Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        .error-bg { background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); }
        .error-card { background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); }
        .animate-pulse-slow { animation: pulse-slow 2s ease-in-out infinite; }
        @keyframes pulse-slow { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
        .animate-fade-in { animation: fadeIn 0.8s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="error-bg min-h-screen flex items-center justify-center p-4">
    <div class="error-card max-w-2xl w-full rounded-3xl shadow-2xl p-8 md:p-12 text-center animate-fade-in">
        <div class="animate-pulse-slow mb-8">
            <div class="w-32 h-32 mx-auto bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center shadow-2xl">
                <i class="fas fa-server text-6xl text-white"></i>
            </div>
        </div>
        
        <h1 class="text-6xl md:text-8xl font-bold bg-gradient-to-r from-red-600 to-red-800 bg-clip-text text-transparent mb-4">
            500
        </h1>
        
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
            Server Error
        </h2>
        
        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
            We're experiencing some technical difficulties. Our team has been notified and is working to fix the issue. Please try again later.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('home') }}" class="bg-gradient-to-r from-red-600 to-red-700 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-red-700 hover:to-red-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-home mr-2"></i>Back to Home
            </a>
            <button onclick="location.reload()" class="border-2 border-red-600 text-red-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-red-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                <i class="fas fa-redo mr-2"></i>Try Again
            </button>
        </div>
        
        <div class="mt-8 p-6 bg-gradient-to-r from-gray-50 to-red-50 rounded-2xl border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-3">Need Help?</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="text-center">
                    <i class="fas fa-envelope text-2xl text-red-600 mb-2"></i>
                    <p class="text-sm text-gray-600">Email Support</p>
                    <p class="text-sm font-medium text-gray-800">support@businesssolutions.com</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-phone text-2xl text-red-600 mb-2"></i>
                    <p class="text-sm text-gray-600">Phone Support</p>
                    <p class="text-sm font-medium text-gray-800">+1 (555) 123-4567</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-clock text-2xl text-red-600 mb-2"></i>
                    <p class="text-sm text-gray-600">Support Hours</p>
                    <p class="text-sm font-medium text-gray-800">24/7 Available</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>