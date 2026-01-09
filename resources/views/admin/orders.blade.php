@extends('layouts.admin')

@section('title', 'Orders - Business Solutions Admin')
@section('page-title', 'Order Management')

@section('content')
<div class="space-y-8">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Orders</h2>
            <p class="text-gray-600">Track and manage customer orders</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors duration-300">
                <i class="fas fa-download mr-2"></i>Export
            </button>
            <button class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-plus mr-2"></i>New Order
            </button>
        </div>
    </div>

    <!-- Orders Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-shopping-cart text-white"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Orders</p>
                    <p class="text-2xl font-bold text-gray-800">{{ count($data['orders']) }}</p>
                </div>
            </div>
        </div>
        
        <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-check-circle text-white"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Completed</p>
                    <p class="text-2xl font-bold text-gray-800">1</p>
                </div>
            </div>
        </div>
        
        <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-clock text-white"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Pending</p>
                    <p class="text-2xl font-bold text-gray-800">2</p>
                </div>
            </div>
        </div>
        
        <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                    <i class="fas fa-truck text-white"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Shipped</p>
                    <p class="text-2xl font-bold text-gray-800">1</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="admin-card rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h3 class="text-xl font-bold text-gray-800">Recent Orders</h3>
                <div class="flex gap-3">
                    <input type="text" placeholder="Search orders..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>All Status</option>
                        <option>Completed</option>
                        <option>Processing</option>
                        <option>Shipped</option>
                        <option>Pending</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($data['orders'] as $order)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $order['id'] }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-xs font-semibold">{{ substr($order['customer'], 0, 1) }}</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">{{ $order['customer'] }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['product'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order['amount'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if($order['status'] == 'Completed') bg-green-100 text-green-800
                                @elseif($order['status'] == 'Processing') bg-blue-100 text-blue-800
                                @elseif($order['status'] == 'Shipped') bg-purple-100 text-purple-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $order['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['date'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-900 transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900 transition-colors duration-200">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection