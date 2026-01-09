<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Business Solutions')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .admin-sidebar { background: linear-gradient(135deg, #1f2937 0%, #111827 100%); }
        .admin-card { background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%); }
        .admin-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .sidebar-item { transition: all 0.3s ease; }
        .sidebar-item:hover { background: rgba(255,255,255,0.1); transform: translateX(5px); }
        .sidebar-item.active { background: rgba(102, 126, 234, 0.2); border-right: 4px solid #667eea; }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 15px 35px rgba(0,0,0,0.1); }
        .stat-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .animate-slide-in { animation: slideIn 0.6s ease-out; }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-100 via-white to-blue-50 min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="admin-sidebar w-64 min-h-screen shadow-2xl">
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center">
                    <i class="fas fa-rocket text-2xl text-indigo-400 mr-3"></i>
                    <div>
                        <h1 class="text-xl font-bold text-white">Admin Panel</h1>
                        <p class="text-gray-400 text-sm">Business Solutions</p>
                    </div>
                </div>
            </div>

            <nav class="mt-6">
                <div class="px-4 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.dashboard') || request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.users') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="fas fa-users mr-3"></i>
                        <span>Users</span>
                    </a>
                    <a href="{{ route('admin.products') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.products') ? 'active' : '' }}">
                        <i class="fas fa-box mr-3"></i>
                        <span>Products</span>
                    </a>
                    <a href="{{ route('admin.orders') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.orders') ? 'active' : '' }}">
                        <i class="fas fa-shopping-cart mr-3"></i>
                        <span>Orders</span>
                    </a>
                    <a href="{{ route('admin.analytics') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.analytics') ? 'active' : '' }}">
                        <i class="fas fa-chart-line mr-3"></i>
                        <span>Analytics</span>
                    </a>
                    <a href="{{ route('admin.reports') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        <i class="fas fa-file-alt mr-3"></i>
                        <span>Reports</span>
                    </a>
                    <a href="#" onclick="alert('Coming Soon!')" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg">
                        <i class="fas fa-envelope mr-3"></i>
                        <span>Messages</span>
                    </a>
                    <a href="{{ route('admin.settings') }}" class="sidebar-item flex items-center px-4 py-3 text-gray-300 rounded-lg {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <i class="fas fa-cog mr-3"></i>
                        <span>Settings</span>
                    </a>
                </div>
            </nav>

            <div class="absolute bottom-0 w-64 p-4 border-t border-gray-700">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-white font-medium">{{ session('admin_user.name', 'Admin') }}</p>
                            <p class="text-xs text-gray-400">{{ session('admin_user.role', 'Administrator') }}</p>
                        </div>
                    </div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-white transition-colors duration-300" title="Logout">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-lg border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fas fa-globe mr-2"></i>Back to Website
                        </a>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <span class="text-gray-700 font-medium">{{ session('admin_user.name', 'Admin') }}</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gradient-to-br from-gray-100 via-white to-blue-50 p-6">
                <div class="animate-slide-in">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Add smooth transitions
            $('.card-hover').hover(
                function() { $(this).addClass('transform -translate-y-1 shadow-xl'); },
                function() { $(this).removeClass('transform -translate-y-1 shadow-xl'); }
            );

            // Initialize any charts if present
            if (typeof Chart !== 'undefined') {
                // Chart initialization will be handled in individual pages
            }
        });
    </script>
</body>
</html>