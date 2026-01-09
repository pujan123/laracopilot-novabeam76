@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full mb-6 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-4">Laravel Assessment Quiz</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Test your Laravel knowledge with our comprehensive quiz. Answer all questions to see your results.</p>
        </div>

        <!-- Quiz Form -->
        <form action="{{ route('quiz.submit') }}" method="POST" id="quizForm" class="space-y-8">
            @csrf
            
            @foreach($questions as $index => $question)
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden transform hover:scale-[1.01] transition-all duration-300">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-6">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <span class="inline-flex items-center justify-center w-8 h-8 bg-white bg-opacity-20 rounded-full mr-4 text-sm font-bold">{{ $index }}</span>
                        {{ $question['question'] }}
                    </h3>
                </div>
                
                <div class="p-8">
                    <div class="space-y-4">
                        @foreach($question['options'] as $key => $option)
                        <label class="flex items-center p-4 bg-gray-50 rounded-xl cursor-pointer hover:bg-indigo-50 transition-all duration-200 group">
                            <input type="radio" name="answers[{{ $question['id'] }}]" value="{{ $key }}" class="w-5 h-5 text-indigo-600 bg-gray-100 border-gray-300 focus:ring-indigo-500 focus:ring-2 mr-4">
                            <span class="text-lg text-gray-700 group-hover:text-indigo-700 transition-colors duration-200">
                                <span class="font-semibold text-indigo-600 mr-2">{{ strtoupper($key) }})</span>
                                {{ $option }}
                            </span>
                        </label>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Submit Button -->
            <div class="text-center pt-8">
                <button type="submit" class="inline-flex items-center px-12 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold text-xl rounded-2xl shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Submit Quiz
                </button>
            </div>
        </form>

        <!-- Progress Indicator -->
        <div class="mt-12 text-center">
            <div class="inline-flex items-center space-x-2 text-gray-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ count($questions) }} Questions • Estimated time: 10 minutes</span>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('quizForm').addEventListener('submit', function(e) {
    const questions = document.querySelectorAll('input[type="radio"]');
    const questionGroups = {};
    
    questions.forEach(function(question) {
        const name = question.name;
        if (!questionGroups[name]) {
            questionGroups[name] = false;
        }
        if (question.checked) {
            questionGroups[name] = true;
        }
    });
    
    const unanswered = Object.values(questionGroups).filter(answered => !answered).length;
    
    if (unanswered > 0) {
        e.preventDefault();
        alert(`Please answer all questions. You have ${unanswered} unanswered question(s).`);
        return false;
    }
    
    if (!confirm('Are you sure you want to submit your quiz? You cannot change your answers after submission.')) {
        e.preventDefault();
        return false;
    }
});
</script>
@endsection