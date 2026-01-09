<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    private $adminCredentials = [
        [
            'email' => 'admin@business.com',
            'password' => 'admin123',
            'name' => 'Admin User',
            'role' => 'Administrator'
        ],
        [
            'email' => 'manager@business.com',
            'password' => 'manager123',
            'name' => 'Manager User',
            'role' => 'Manager'
        ],
        [
            'email' => 'supervisor@business.com',
            'password' => 'supervisor123',
            'name' => 'Supervisor User',
            'role' => 'Supervisor'
        ]
    ];

    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login', ['credentials' => $this->adminCredentials]);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        foreach ($this->adminCredentials as $credential) {
            if ($credential['email'] === $email && $credential['password'] === $password) {
                session([
                    'admin_logged_in' => true,
                    'admin_user' => $credential
                ]);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login');
    }
}