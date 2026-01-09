<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Business Solutions - Transform Your Success')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
        .btn-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-gradient:hover { background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%); transform: translateY(-2px); }
        .text-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .animate-fade-in { animation: fadeIn 0.8s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .hero-pattern { background-image: radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgba(255,255,255,0.1) 0%, transparent 50%); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-blue-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-gradient">
                        <i class="fas fa-rocket mr-2"></i>BusinessSolutions
                    </a>
                </div>
                
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-8">
                        <a href="#home" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-indigo-50">Home</a>
                        <a href="#about" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-indigo-50">About</a>
                        <a href="#services" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-indigo-50">Services</a>
                        <a href="#testimonials" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-indigo-50">Testimonials</a>
                        <a href="#contact" class="text-gray-700 hover:text-indigo-600 px-3 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-indigo-50">Contact</a>
                        <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-4 py-2 rounded-full text-sm font-medium hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            <i class="fas fa-cog mr-1"></i>Admin
                        </a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-indigo-600 focus:outline-none focus:text-indigo-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#home" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#about" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">About</a>
                <a href="#services" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">Services</a>
                <a href="#testimonials" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">Testimonials</a>
                <a href="#contact" class="text-gray-700 hover:text-indigo-600 block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white block px-3 py-2 rounded-md text-base font-medium">Admin Panel</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-rocket text-2xl text-indigo-400 mr-2"></i>
                        <span class="text-xl font-bold">BusinessSolutions</span>
                    </div>
                    <p class="text-gray-300 mb-4">Transforming businesses with innovative solutions and strategic expertise. Your success is our mission.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors duration-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors duration-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors duration-300"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-indigo-400 transition-colors duration-300"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold mb-4 text-indigo-400">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-300 hover:text-white transition-colors duration-300">Home</a></li>
                        <li><a href="#about" class="text-gray-300 hover:text-white transition-colors duration-300">About Us</a></li>
                        <li><a href="#services" class="text-gray-300 hover:text-white transition-colors duration-300">Services</a></li>
                        <li><a href="#testimonials" class="text-gray-300 hover:text-white transition-colors duration-300">Testimonials</a></li>
                        <li><a href="#contact" class="text-gray-300 hover:text-white transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold mb-4 text-indigo-400">Our Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">Business Consulting</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">Digital Solutions</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">Analytics & Reports</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">Premium Support</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">Custom Development</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-span-1">
                    <h3 class="text-lg font-semibold mb-4 text-indigo-400">Contact Info</h3>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt text-indigo-400 mr-3"></i>
                            <span class="text-gray-300">123 Business Ave, Suite 100<br>New York, NY 10001</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone text-indigo-400 mr-3"></i>
                            <span class="text-gray-300">+1 (555) 123-4567</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-indigo-400 mr-3"></i>
                            <span class="text-gray-300">info@businesssolutions.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">© {{ date('Y') }} BusinessSolutions. All rights reserved.</p>
                <p class="text-gray-500 mt-2">Made with ❤️ by LaraCopilot</p>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            // Mobile menu toggle
            $('#mobile-menu-btn').click(function() {
                $('#mobile-menu').toggleClass('hidden');
            });

            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if( target.length ) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 80
                    }, 1000);
                }
            });

            // Add animation classes on scroll
            $(window).scroll(function() {
                $('.animate-on-scroll').each(function() {
                    var elementTop = $(this).offset().top;
                    var elementBottom = elementTop + $(this).outerHeight();
                    var viewportTop = $(window).scrollTop();
                    var viewportBottom = viewportTop + $(window).height();
                    
                    if (elementBottom > viewportTop && elementTop < viewportBottom) {
                        $(this).addClass('animate-fade-in');
                    }
                });
            });
        });
    </script>
</body>
</html>