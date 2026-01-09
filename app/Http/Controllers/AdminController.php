<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Simple session check
    }

    private function checkAuth()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return null;
    }

    public function dashboard()
    {
        $redirect = $this->checkAuth();
        if ($redirect) return $redirect;

        $data = [
            'stats' => [
                ['title' => 'Total Revenue', 'value' => '$124,580', 'change' => '+12.5%', 'color' => 'green'],
                ['title' => 'Active Users', 'value' => '2,847', 'change' => '+8.2%', 'color' => 'blue'],
                ['title' => 'Orders Today', 'value' => '156', 'change' => '+15.3%', 'color' => 'purple'],
                ['title' => 'Conversion Rate', 'value' => '3.24%', 'change' => '+2.1%', 'color' => 'orange']
            ],
            'recent_orders' => [
                ['id' => '#ORD-001', 'customer' => 'John Doe', 'amount' => '$299.99', 'status' => 'Completed'],
                ['id' => '#ORD-002', 'customer' => 'Jane Smith', 'amount' => '$149.50', 'status' => 'Processing'],
                ['id' => '#ORD-003', 'customer' => 'Mike Johnson', 'amount' => '$89.99', 'status' => 'Shipped'],
                ['id' => '#ORD-004', 'customer' => 'Sarah Wilson', 'amount' => '$199.99', 'status' => 'Pending']
            ]
        ];

        return view('admin.dashboard', compact('data'));
    }

    public function users()
    {
        $redirect = $this->checkAuth();
        if ($redirect) return $redirect;

        $data = [
            'users' => [
                ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Customer', 'status' => 'Active', 'joined' => '2024-01-15'],
                ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'Customer', 'status' => 'Active', 'joined' => '2024-01-20'],
                ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike@example.com', 'role' => 'Premium', 'status' => 'Active', 'joined' => '2024-01-25'],
                ['id' => 4, 'name' => 'Sarah Wilson', 'email' => 'sarah@example.com', 'role' => 'Customer', 'status' => 'Inactive', 'joined' => '2024-02-01']
            ]
        ];

        return view('admin.users', compact('data'));
    }

    public function products()
    {
        $redirect = $this->checkAuth();
        if ($redirect) return $redirect;

        $data = [
            'products' => [
                ['id' => 1, 'name' => 'Business Consulting Package', 'category' => 'Services', 'price' => '$299.00', 'stock' => 'Unlimited', 'status' => 'Active'],
                ['id' => 2, 'name' => 'Digital Solutions Suite', 'category' => 'Software', 'price' => '$499.00', 'stock' => 'Unlimited', 'status' => 'Active'],
                ['id' => 3, 'name' => 'Analytics Dashboard', 'category' => 'Tools', 'price' => '$199.00', 'stock' => 'Unlimited', 'status' => 'Active'],
                ['id' => 4, 'name' => 'Premium Support Plan', 'category' => 'Services', 'price' => '$99.00', 'stock' => 'Unlimited', 'status' => 'Draft']
            ]
        ];

        return view('admin.products', compact('data'));
    }

    public function orders()
    {
        $redirect = $this->checkAuth();
        if ($redirect) return $redirect;

        $data = [
            'orders' => [
                ['id' => '#ORD-001', 'customer' => 'John Doe', 'product' => 'Business Consulting', 'amount' => '$299.99', 'status' => 'Completed', 'date' => '2024-01-15'],
                ['id' => '#ORD-002', 'customer' => 'Jane Smith', 'product' => 'Digital Solutions', 'amount' => '$149.50', 'status' => 'Processing', 'date' => '2024-01-16'],
                ['id' => '#ORD-003', 'customer' => 'Mike Johnson', 'product' => 'Analytics Dashboard', 'amount' => '$89.99', 'status' => 'Shipped', 'date' => '2024-01-17'],
                ['id' => '#ORD-004', 'customer' => 'Sarah Wilson', 'product' => 'Premium Support', 'amount' => '$199.99', 'status' => 'Pending', 'date' => '2024-01-18']
            ]
        ];

        return view('admin.orders', compact('data'));
    }

    public function analytics()
    {
        $redirect = $this->checkAuth();
        if ($redirect) return $redirect;

        $data = [
            'metrics' => [
                ['title' => 'Page Views', 'value' => '45,672', 'change' => '+18.2%'],
                ['title' => 'Unique Visitors', 'value' => '12,847', 'change' => '+12.5%'],
                ['title' => 'Bounce Rate', 'value' => '32.4%', 'change' => '-5.1%'],
                ['title' => 'Avg. Session', 'value' => '4:32', 'change' => '+8.7%']
            ]
        ];

        return view('admin.analytics', compact('data'));
    }

    public function settings()
    {
        $redirect = $this->checkAuth();
        if ($redirect) return $redirect;

        $data = [
            'settings' => [
                'site_name' => 'Business Solutions',
                'site_email' => 'admin@business.com',
                'maintenance_mode' => false,
                'notifications' => true
            ]
        ];

        return view('admin.settings', compact('data'));
    }

    public function reports()
    {
        $redirect = $this->checkAuth();
        if ($redirect) return $redirect;

        $data = [
            'reports' => [
                ['name' => 'Monthly Revenue Report', 'type' => 'Financial', 'generated' => '2024-01-31', 'status' => 'Ready'],
                ['name' => 'User Activity Report', 'type' => 'Analytics', 'generated' => '2024-01-30', 'status' => 'Ready'],
                ['name' => 'Product Performance', 'type' => 'Sales', 'generated' => '2024-01-29', 'status' => 'Processing'],
                ['name' => 'Customer Satisfaction', 'type' => 'Survey', 'generated' => '2024-01-28', 'status' => 'Ready']
            ]
        ];

        return view('admin.reports', compact('data'));
    }
}