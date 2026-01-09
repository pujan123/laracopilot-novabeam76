<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('user_logged_in')) {
            return redirect()->route('login');
        }

        $stats = [
            'total_quizzes' => 15,
            'completed_quizzes' => 8,
            'average_score' => 85,
            'best_score' => 95,
            'time_spent' => '2h 45m',
            'rank' => 'Advanced'
        ];

        $recentQuizzes = [
            ['id' => 1, 'title' => 'Laravel Basics', 'score' => 90, 'date' => '2024-01-15', 'status' => 'Completed'],
            ['id' => 2, 'title' => 'Eloquent ORM', 'score' => 85, 'date' => '2024-01-14', 'status' => 'Completed'],
            ['id' => 3, 'title' => 'Routing & Middleware', 'score' => 95, 'date' => '2024-01-13', 'status' => 'Completed'],
            ['id' => 4, 'title' => 'Blade Templates', 'score' => 80, 'date' => '2024-01-12', 'status' => 'Completed'],
            ['id' => 5, 'title' => 'Authentication', 'score' => 0, 'date' => null, 'status' => 'Available'],
        ];

        return view('dashboard', compact('stats', 'recentQuizzes'));
    }
}