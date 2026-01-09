@extends('layouts.app')

@section('title', 'Quiz Results - Laravel Assessment')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Results Header -->
        <div class="text-center mb-12">
            <div class="success-gradient rounded-2xl p-8 text-white mb-8">
                <i class="fas fa-trophy text-6xl mb-4 animate-bounce-slow"></i>
                <h1 class="text-4xl font-bold mb-4">Quiz Complete!</h1>
                <p class="text-xl opacity-90">Here are your Laravel assessment results</p>
            </div>
        </div>

        <!-- Score Summary -->
        <div class="bg-white rounded-xl card-shadow p-8 mb-8">
            <div class="text-center mb-8">
                <div class="text-6xl font-bold 
                    @if($score >= 8) text-green-600
                    @elseif($score >= 6) text-blue-600
                    @elseif($score >= 4) text-yellow-600
                    @else text-red-600
                    @endif mb-4">
                    {{ $score }}/10
                </div>
                <div class="text-2xl font-semibold text-gray-900 mb-2">
                    {{ ($score / 10) * 100 }}% Score
                </div>
                <div class="text-lg text-gray-600">
                    @if($score >= 9)
                        🏆 Excellent! Laravel Expert Level
                    @elseif($score >= 7)
                        🥇 Great job! Advanced Laravel Knowledge
                    @elseif($score >= 5)
                        🥈 Good work! Intermediate Laravel Skills
                    @elseif($score >= 3)
                        🥉 Keep learning! Basic Laravel Understanding
                    @else
                        📚 Study more! Beginner Laravel Level
                    @endif
                </div>
            </div>

            <!-- Performance Breakdown -->
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center p-4 bg-green-50 rounded-lg">
                    <div class="text-3xl font-bold text-green-600">{{ $score }}</div>
                    <div class="text-gray-700">Correct Answers</div>
                </div>
                <div class="text-center p-4 bg-red-50 rounded-lg">
                    <div class="text-3xl font-bold text-red-600">{{ 10 - $score }}</div>
                    <div class="text-gray-700">Incorrect Answers</div>
                </div>
                <div class="text-center p-4 bg-blue-50 rounded-lg">
                    <div class="text-3xl font-bold text-blue-600">{{ ($score / 10) * 100 }}%</div>
                    <div class="text-gray-700">Accuracy Rate</div>
                </div>
            </div>
        </div>

        <!-- Detailed Results -->
        <div class="bg-white rounded-xl card-shadow p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Detailed Results</h2>
            <div class="space-y-6">
                @foreach($answers as $index => $answer)
                <div class="border border-gray-200 rounded-lg p-6 {{ $answer['is_correct'] ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200' }}">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 mb-2">Question {{ $index + 1 }}</h3>
                            <p class="text-gray-800">{{ $answer['question'] }}</p>
                        </div>
                        <div class="flex-shrink-0 ml-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                {{ $answer['is_correct'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                <i class="fas {{ $answer['is_correct'] ? 'fa-check' : 'fa-times' }} mr-1"></i>
                                {{ $answer['is_correct'] ? 'Correct' : 'Incorrect' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <span class="text-sm font-medium text-gray-600">Your Answer:</span>
                            <span class="ml-2 font-semibold {{ $answer['is_correct'] ? 'text-green-700' : 'text-red-700' }}">
                                {{ $answer['selected'] }}
                            </span>
                        </div>
                        @if(!$answer['is_correct'])
                        <div>
                            <span class="text-sm font-medium text-gray-600">Correct Answer:</span>
                            <span class="ml-2 font-semibold text-green-700">{{ $answer['correct'] }}</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Explanation:</h4>
                        <p class="text-gray-700">{{ $answer['explanation'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center space-y-4">
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('quiz.index') }}" class="btn-gradient text-white px-8 py-3 rounded-lg font-semibold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <i class="fas fa-redo mr-2"></i> Take Quiz Again
                </a>
                <a href="{{ route('dashboard') }}" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-lg font-semibold text-lg hover:bg-gray-200 transition duration-300 transform hover:scale-105">
                    <i class="fas fa-tachometer-alt mr-2"></i> Back to Dashboard
                </a>
            </div>
            
            <!-- Study Recommendations -->
            @if($score < 7)
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mt-8">
                <h3 class="font-semibold text-blue-800 mb-3">📚 Recommended Study Areas:</h3>
                <div class="text-blue-700 space-y-1">
                    @if($score < 4)
                        <p>• Review Laravel fundamentals and basic concepts</p>
                        <p>• Practice with Laravel documentation and tutorials</p>
                        <p>• Focus on Artisan commands and project structure</p>
                    @elseif($score < 7)
                        <p>• Deepen your knowledge of Eloquent relationships</p>
                        <p>• Study advanced routing and middleware concepts</p>
                        <p>• Practice with Laravel's service container and facades</p>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection