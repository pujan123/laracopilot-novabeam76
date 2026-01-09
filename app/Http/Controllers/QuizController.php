<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        return view('quiz.index');
    }

    public function start()
    {
        $questions = [
            [
                'id' => 1,
                'question' => 'What is Laravel primarily used for?',
                'options' => [
                    'a' => 'Mobile app development',
                    'b' => 'Web application development',
                    'c' => 'Desktop software',
                    'd' => 'Game development'
                ],
                'correct' => 'b'
            ],
            [
                'id' => 2,
                'question' => 'Which command is used to create a new Laravel project?',
                'options' => [
                    'a' => 'composer create-project laravel/laravel',
                    'b' => 'laravel new project',
                    'c' => 'php artisan make:project',
                    'd' => 'npm create laravel'
                ],
                'correct' => 'a'
            ],
            [
                'id' => 3,
                'question' => 'What is Eloquent in Laravel?',
                'options' => [
                    'a' => 'A templating engine',
                    'b' => 'An ORM (Object-Relational Mapping)',
                    'c' => 'A routing system',
                    'd' => 'A testing framework'
                ],
                'correct' => 'b'
            ],
            [
                'id' => 4,
                'question' => 'Which file contains Laravel routes?',
                'options' => [
                    'a' => 'app/routes.php',
                    'b' => 'config/routes.php',
                    'c' => 'routes/web.php',
                    'd' => 'public/routes.php'
                ],
                'correct' => 'c'
            ],
            [
                'id' => 5,
                'question' => 'What is Blade in Laravel?',
                'options' => [
                    'a' => 'A database tool',
                    'b' => 'A templating engine',
                    'c' => 'A command line interface',
                    'd' => 'A testing suite'
                ],
                'correct' => 'b'
            ],
            [
                'id' => 6,
                'question' => 'Which artisan command creates a new controller?',
                'options' => [
                    'a' => 'php artisan create:controller',
                    'b' => 'php artisan make:controller',
                    'c' => 'php artisan new:controller',
                    'd' => 'php artisan generate:controller'
                ],
                'correct' => 'b'
            ],
            [
                'id' => 7,
                'question' => 'What is middleware in Laravel?',
                'options' => [
                    'a' => 'Database connection layer',
                    'b' => 'HTTP request filtering mechanism',
                    'c' => 'View rendering system',
                    'd' => 'File storage system'
                ],
                'correct' => 'b'
            ],
            [
                'id' => 8,
                'question' => 'Which method is used to retrieve all records from a model?',
                'options' => [
                    'a' => 'Model::get()',
                    'b' => 'Model::all()',
                    'c' => 'Model::fetch()',
                    'd' => 'Model::select()'
                ],
                'correct' => 'b'
            ],
            [
                'id' => 9,
                'question' => 'What is the default session driver in Laravel?',
                'options' => [
                    'a' => 'database',
                    'b' => 'redis',
                    'c' => 'file',
                    'd' => 'cookie'
                ],
                'correct' => 'c'
            ],
            [
                'id' => 10,
                'question' => 'Which command runs Laravel migrations?',
                'options' => [
                    'a' => 'php artisan migrate',
                    'b' => 'php artisan run:migration',
                    'c' => 'php artisan db:migrate',
                    'd' => 'php artisan migration:run'
                ],
                'correct' => 'a'
            ]
        ];

        return view('quiz.start', compact('questions'));
    }

    public function startPost(Request $request)
    {
        return $this->start();
    }

    public function submit(Request $request)
    {
        $answers = $request->input('answers', []);
        $correctAnswers = [
            1 => 'b', 2 => 'a', 3 => 'b', 4 => 'c', 5 => 'b',
            6 => 'b', 7 => 'b', 8 => 'b', 9 => 'c', 10 => 'a'
        ];

        $score = 0;
        $totalQuestions = count($correctAnswers);
        $results = [];

        foreach ($correctAnswers as $questionId => $correctAnswer) {
            $userAnswer = $answers[$questionId] ?? null;
            $isCorrect = $userAnswer === $correctAnswer;
            
            if ($isCorrect) {
                $score++;
            }

            $results[] = [
                'question_id' => $questionId,
                'user_answer' => $userAnswer,
                'correct_answer' => $correctAnswer,
                'is_correct' => $isCorrect
            ];
        }

        $percentage = round(($score / $totalQuestions) * 100);

        return redirect()->route('quiz.results', ['score' => $percentage])
                        ->with('results', $results)
                        ->with('score', $score)
                        ->with('total', $totalQuestions);
    }

    public function results($score)
    {
        $results = session('results', []);
        $scoreCount = session('score', 0);
        $total = session('total', 10);

        $questions = [
            1 => 'What is Laravel primarily used for?',
            2 => 'Which command is used to create a new Laravel project?',
            3 => 'What is Eloquent in Laravel?',
            4 => 'Which file contains Laravel routes?',
            5 => 'What is Blade in Laravel?',
            6 => 'Which artisan command creates a new controller?',
            7 => 'What is middleware in Laravel?',
            8 => 'Which method is used to retrieve all records from a model?',
            9 => 'What is the default session driver in Laravel?',
            10 => 'Which command runs Laravel migrations?'
        ];

        $options = [
            1 => ['a' => 'Mobile app development', 'b' => 'Web application development', 'c' => 'Desktop software', 'd' => 'Game development'],
            2 => ['a' => 'composer create-project laravel/laravel', 'b' => 'laravel new project', 'c' => 'php artisan make:project', 'd' => 'npm create laravel'],
            3 => ['a' => 'A templating engine', 'b' => 'An ORM (Object-Relational Mapping)', 'c' => 'A routing system', 'd' => 'A testing framework'],
            4 => ['a' => 'app/routes.php', 'b' => 'config/routes.php', 'c' => 'routes/web.php', 'd' => 'public/routes.php'],
            5 => ['a' => 'A database tool', 'b' => 'A templating engine', 'c' => 'A command line interface', 'd' => 'A testing suite'],
            6 => ['a' => 'php artisan create:controller', 'b' => 'php artisan make:controller', 'c' => 'php artisan new:controller', 'd' => 'php artisan generate:controller'],
            7 => ['a' => 'Database connection layer', 'b' => 'HTTP request filtering mechanism', 'c' => 'View rendering system', 'd' => 'File storage system'],
            8 => ['a' => 'Model::get()', 'b' => 'Model::all()', 'c' => 'Model::fetch()', 'd' => 'Model::select()'],
            9 => ['a' => 'database', 'b' => 'redis', 'c' => 'file', 'd' => 'cookie'],
            10 => ['a' => 'php artisan migrate', 'b' => 'php artisan run:migration', 'c' => 'php artisan db:migrate', 'd' => 'php artisan migration:run']
        ];

        return view('quiz.results', compact('score', 'results', 'scoreCount', 'total', 'questions', 'options'));
    }
}