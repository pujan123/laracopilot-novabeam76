<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $users = [
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@laravel.com', 'password' => 'password123'],
        ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@laravel.com', 'password' => 'password123'],
        ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike@laravel.com', 'password' => 'password123'],
    ];

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        foreach ($this->users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                session(['user_logged_in' => true, 'user' => $user]);
                return redirect()->route('dashboard');
            }
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $newUser = [
            'id' => count($this->users) + 1,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        session(['user_logged_in' => true, 'user' => $newUser]);
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->forget(['user_logged_in', 'user']);
        return redirect()->route('home');
    }
}