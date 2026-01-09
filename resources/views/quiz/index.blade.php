@extends('layouts.app')

@section('title', 'Laravel Quiz Assessment')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Quiz Header -->
        <div class="text-center mb-12">
            <div class="quiz-gradient rounded-2xl p-8 text-white mb-8">
                <i class="fas fa-brain text-6xl mb-4 animate-bounce-slow"></i>
                <h1 class="text-4xl font-bold mb-4">Laravel Knowledge Assessment</h1>
                <p class="text-xl opacity-90">Test your Laravel expertise with 10 carefully selected questions</p>
            </div>
        </div>

        <!-- Quiz Instructions -->
        <div class="bg-white rounded-xl card-shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Quiz Instructions</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-question text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">10 Questions</h3>
                            <p class="text-gray-600">You'll answer 10 multiple-choice questions about Laravel</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-lightbulb text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Instant Feedback</h3>
                            <p class="text-gray-600">Get detailed explanations for each answer</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-clock text-purple-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">No Time Limit</h3>
                            <p class="text-gray-600">Take your time to think through each question</p>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-chart-line text-orange-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Track Progress</h3>
                            <p class="text-gray-600">Monitor your Laravel knowledge improvement</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-trophy text-red-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Score & Rank</h3>
                            <p class="text-gray-600">Get scored and see your Laravel proficiency level</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-3">
                        <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-redo text-indigo-600"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Retake Anytime</h3>
                            <p class="text-gray-600">Practice as many times as you want</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Topics Covered -->
        <div class="bg-white rounded-xl card-shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Topics Covered</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg">
                    <i class="fas fa-terminal text-2xl text-blue-600 mb-2"></i>
                    <div class="font-semibold text-gray-900">Artisan CLI</div>
                </div>
                <div class="text-center p-4 bg-gradient-to-br from-green-50 to-green-100 rounded-lg">
                    <i class="fas fa-database text-2xl text-green-600 mb-2"></i>
                    <div class="font-semibold text-gray-900">Eloquent ORM</div>
                </div>
                <div class="text-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg">
                    <i class="fas fa-route text-2xl text-purple-600 mb-2"></i>
                    <div class="font-semibold text-gray-900">Routing</div>
                </div>
                <div class="text-center p-4 bg-gradient-to-br from-orange-50 to-orange-100 rounded-lg">
                    <i class="fas fa-eye text-2xl text-orange-600 mb-2"></i>
                    <div class="font-semibold text-gray-900">Blade Templates</div>
                </div>
            </div>
        </div>

        <!-- Start Quiz Button -->
        <div class="text-center">
            <form action="{{ route('quiz.start') }}" method="POST">
                @csrf
                <button type="submit" class="btn-gradient text-white px-12 py-4 rounded-xl font-bold text-xl hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <i class="fas fa-play mr-3"></i> Start Laravel Assessment
                </button>
            </form>
            <p class="text-gray-600 mt-4">Ready to test your Laravel knowledge? Let's begin!</p>
        </div>
    </div>
</div>
@endsection