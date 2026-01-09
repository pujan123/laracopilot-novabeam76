@extends('layouts.app')

@section('title', 'Business Solutions - Transform Your Success')

@section('content')
<!-- Hero Section -->
<section id="home" class="gradient-bg hero-pattern min-h-screen flex items-center justify-center text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-fade-in">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                {{ $data['hero']['title'] }}
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200 max-w-3xl mx-auto leading-relaxed">
                {{ $data['hero']['subtitle'] }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ $data['hero']['cta_link'] }}" class="btn-gradient px-8 py-4 rounded-full text-lg font-semibold hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-rocket mr-2"></i>{{ $data['hero']['cta_text'] }}
                </a>
                <a href="#about" class="border-2 border-white text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white hover:text-indigo-600 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-play mr-2"></i>Learn More
                </a>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-white opacity-10 rounded-full animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-32 h-32 bg-white opacity-5 rounded-full animate-bounce"></div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-gradient-to-r from-white via-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                Why Choose <span class="text-gradient">Our Solutions</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We deliver exceptional results through innovative strategies and cutting-edge technology
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($data['features'] as $feature)
            <div class="admin-card p-8 rounded-2xl shadow-lg card-hover animate-on-scroll border border-gray-100">
                <div class="w-16 h-16 admin-gradient rounded-2xl flex items-center justify-center mb-6 mx-auto">
                    <i class="{{ $feature['icon'] }} text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4 text-center">{{ $feature['title'] }}</h3>
                <p class="text-gray-600 text-center leading-relaxed">{{ $feature['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    About <span class="text-gradient">Our Company</span>
                </h2>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    With over a decade of experience in business transformation, we've helped hundreds of companies achieve their goals through innovative solutions and strategic partnerships.
                </p>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Our team of experts combines industry knowledge with cutting-edge technology to deliver results that exceed expectations and drive sustainable growth.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#services" class="btn-gradient px-6 py-3 rounded-full text-white font-semibold hover:shadow-xl transition-all duration-300 text-center">
                        <i class="fas fa-arrow-right mr-2"></i>Explore Services
                    </a>
                    <a href="#contact" class="border-2 border-indigo-600 text-indigo-600 px-6 py-3 rounded-full font-semibold hover:bg-indigo-600 hover:text-white transition-all duration-300 text-center">
                        <i class="fas fa-phone mr-2"></i>Contact Us
                    </a>
                </div>
            </div>
            
            <div class="animate-on-scroll">
                <div class="grid grid-cols-2 gap-6">
                    <div class="admin-card p-6 rounded-2xl shadow-lg text-center card-hover">
                        <div class="text-3xl font-bold text-gradient mb-2">500+</div>
                        <div class="text-gray-600">Projects Completed</div>
                    </div>
                    <div class="admin-card p-6 rounded-2xl shadow-lg text-center card-hover">
                        <div class="text-3xl font-bold text-gradient mb-2">98%</div>
                        <div class="text-gray-600">Client Satisfaction</div>
                    </div>
                    <div class="admin-card p-6 rounded-2xl shadow-lg text-center card-hover">
                        <div class="text-3xl font-bold text-gradient mb-2">24/7</div>
                        <div class="text-gray-600">Support Available</div>
                    </div>
                    <div class="admin-card p-6 rounded-2xl shadow-lg text-center card-hover">
                        <div class="text-3xl font-bold text-gradient mb-2">10+</div>
                        <div class="text-gray-600">Years Experience</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-gradient-to-r from-white via-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                Our <span class="text-gradient">Premium Services</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive solutions tailored to your business needs and growth objectives
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($data['services'] as $service)
            <div class="admin-card p-8 rounded-2xl shadow-lg card-hover animate-on-scroll border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 admin-gradient opacity-10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 admin-gradient rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-star text-2xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $service['description'] }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-gradient">{{ $service['price'] }}</span>
                        <a href="#contact" class="btn-gradient px-6 py-2 rounded-full text-white font-semibold hover:shadow-lg transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-gradient-to-br from-indigo-50 via-white to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                What Our <span class="text-gradient">Clients Say</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Don't just take our word for it - hear from our satisfied clients
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($data['testimonials'] as $testimonial)
            <div class="admin-card p-8 rounded-2xl shadow-lg card-hover animate-on-scroll border border-gray-100">
                <div class="flex mb-4">
                    @for($i = 0; $i < $testimonial['rating']; $i++)
                    <i class="fas fa-star text-yellow-400"></i>
                    @endfor
                </div>
                <p class="text-gray-600 mb-6 italic leading-relaxed">"{{ $testimonial['content'] }}"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 admin-gradient rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold">{{ substr($testimonial['name'], 0, 1) }}</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800">{{ $testimonial['name'] }}</h4>
                        <p class="text-gray-600 text-sm">{{ $testimonial['position'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Ready to <span class="bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">Transform Your Business?</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Get in touch with our experts and start your journey to success today
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div class="animate-on-scroll">
                <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                <div class="space-y-6">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Address</h4>
                            <p class="text-gray-300">123 Business Ave, Suite 100, New York, NY 10001</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Phone</h4>
                            <p class="text-gray-300">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold">Email</h4>
                            <p class="text-gray-300">info@businesssolutions.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="animate-on-scroll">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="text" placeholder="Your Name" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-indigo-500 transition-colors duration-300">
                        <input type="email" placeholder="Your Email" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-indigo-500 transition-colors duration-300">
                    </div>
                    <input type="text" placeholder="Subject" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-indigo-500 transition-colors duration-300">
                    <textarea rows="5" placeholder="Your Message" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-indigo-500 transition-colors duration-300 resize-none"></textarea>
                    <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-paper-plane mr-2"></i>Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection