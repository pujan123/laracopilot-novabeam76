@extends('layouts.app')

@section('title', 'Quiz Question - Laravel Assessment')

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-gray-700">Question {{ $questionNumber }} of 10</span>
                <span class="text-sm font-medium text-gray-700">{{ ($questionNumber / 10) * 100 }}% Complete</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-3">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 h-3 rounded-full transition-all duration-500" style="width: {{ ($questionNumber / 10) * 100 }}%"></div>
            </div>
        </div>

        <!-- Question Card -->
        <div class="bg-white rounded-xl card-shadow p-8 mb-8">
            <div class="mb-6">
                <span class="inline-block bg-purple-100 text-purple-800 text-sm font-semibold px-3 py-1 rounded-full mb-4">
                    Question {{ $questionNumber }}
                </span>
                <h2 class="text-2xl font-bold text-gray-900 leading-relaxed">
                    {{ $question['question'] }}
                </h2>
            </div>

            <form id="quiz-form">
                @csrf
                <div class="space-y-4">
                    @foreach($question['options'] as $key => $option)
                    <label class="block cursor-pointer">
                        <div class="border-2 border-gray-200 rounded-lg p-4 hover:border-purple-300 hover:bg-purple-50 transition duration-300 transform hover:scale-105">
                            <div class="flex items-center">
                                <input type="radio" name="answer" value="{{ $key }}" class="sr-only">
                                <div class="w-6 h-6 border-2 border-gray-300 rounded-full mr-4 flex items-center justify-center option-radio">
                                    <div class="w-3 h-3 bg-purple-600 rounded-full hidden"></div>
                                </div>
                                <span class="text-lg text-gray-900 font-medium">{{ $key }}.</span>
                                <span class="text-lg text-gray-700 ml-2">{{ $option }}</span>
                            </div>
                        </div>
                    </label>
                    @endforeach
                </div>

                <div class="mt-8 text-center">
                    <button type="submit" id="submit-answer" class="btn-gradient text-white px-8 py-3 rounded-lg font-semibold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        <i class="fas fa-check mr-2"></i> Submit Answer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Answer Popup Modal -->
<div id="answer-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-8">
            <div id="answer-content">
                <!-- Content will be populated by JavaScript -->
            </div>
            <div class="mt-8 text-center">
                <button id="next-question" class="btn-gradient text-white px-8 py-3 rounded-lg font-semibold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <i class="fas fa-arrow-right mr-2"></i> Next Question
                </button>
                <button id="view-results" class="btn-gradient text-white px-8 py-3 rounded-lg font-semibold text-lg hover:shadow-lg transition duration-300 transform hover:scale-105 hidden">
                    <i class="fas fa-chart-bar mr-2"></i> View Results
                </button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Handle radio button selection
    $('input[name="answer"]').change(function() {
        // Reset all radio buttons
        $('.option-radio').removeClass('border-purple-600 bg-purple-100');
        $('.option-radio div').addClass('hidden');
        
        // Style selected option
        $(this).closest('label').find('.option-radio').addClass('border-purple-600 bg-purple-100');
        $(this).closest('label').find('.option-radio div').removeClass('hidden');
        
        // Enable submit button
        $('#submit-answer').prop('disabled', false);
    });

    // Handle form submission
    $('#quiz-form').submit(function(e) {
        e.preventDefault();
        
        const selectedAnswer = $('input[name="answer"]:checked').val();
        if (!selectedAnswer) return;

        // Disable form
        $('#submit-answer').prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i> Processing...');
        $('input[name="answer"]').prop('disabled', true);

        $.ajax({
            url: "{{ route('quiz.answer') }}",
            method: 'POST',
            data: {
                answer: selectedAnswer,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                showAnswerModal(response);
            },
            error: function() {
                alert('An error occurred. Please try again.');
                $('#submit-answer').prop('disabled', false).html('<i class="fas fa-check mr-2"></i> Submit Answer');
                $('input[name="answer"]').prop('disabled', false);
            }
        });
    });

    function showAnswerModal(response) {
        const isCorrect = response.correct;
        const explanation = response.explanation;
        const correctAnswer = response.correct_answer;

        let content = `
            <div class="text-center mb-6">
                <div class="w-20 h-20 mx-auto mb-4 ${isCorrect ? 'bg-green-100' : 'bg-red-100'} rounded-full flex items-center justify-center">
                    <i class="fas ${isCorrect ? 'fa-check text-green-600' : 'fa-times text-red-600'} text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold ${isCorrect ? 'text-green-600' : 'text-red-600'} mb-2">
                    ${isCorrect ? 'Correct!' : 'Incorrect'}
                </h3>
                ${!isCorrect ? `<p class="text-gray-600">The correct answer is <strong>${correctAnswer}</strong></p>` : ''}
            </div>
            <div class="bg-gray-50 rounded-lg p-6">
                <h4 class="font-semibold text-gray-900 mb-3">Explanation:</h4>
                <p class="text-gray-700 leading-relaxed">${explanation}</p>
            </div>
        `;

        $('#answer-content').html(content);
        $('#answer-modal').removeClass('hidden').addClass('flex');

        if (response.quiz_complete) {
            $('#next-question').addClass('hidden');
            $('#view-results').removeClass('hidden');
        }
    }

    // Handle next question
    $('#next-question').click(function() {
        $('#answer-modal').addClass('hidden').removeClass('flex');
        
        $.ajax({
            url: "{{ route('quiz.answer') }}",
            method: 'POST',
            data: {
                answer: $('input[name="answer"]:checked').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.next_question) {
                    $('body').html(response.next_question);
                }
            }
        });
    });

    // Handle view results
    $('#view-results').click(function() {
        window.location.href = "{{ route('quiz.result') }}";
    });

    // Close modal when clicking outside
    $('#answer-modal').click(function(e) {
        if (e.target === this) {
            $(this).addClass('hidden').removeClass('flex');
        }
    });
});
</script>
@endsection