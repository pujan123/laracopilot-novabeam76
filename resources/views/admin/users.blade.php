@extends('layouts.admin')

@section('title', 'Users - Business Solutions Admin')
@section('page-title', 'User Management')

@section('content')
<div class="space-y-8">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Users</h2>
            <p class="text-gray-600">Manage your customer accounts and user permissions</p>
        </div>
        <button class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <i class="fas fa-plus mr-2"></i>Add New User
        </button>
    </div>

    <!-- Users Table -->
    <div class="admin-card rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h3 class="text-xl font-bold text-gray-800">All Users</h3>
                <div class="flex gap-3">
                    <input type="text" placeholder="Search users..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>All Roles</option>
                        <option>Customer</option>
                        <option>Premium</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($data['users'] as $user)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-white font-semibold">{{ substr($user['name'], 0, 1) }}</span>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ $user['name'] }}</div>
                                    <div class="text-sm text-gray-500">{{ $user['email'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($user['role'] == 'Premium') bg-purple-100 text-purple-800
                                @else bg-blue-100 text-blue-800 @endif">
                                {{ $user['role'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                @if($user['status'] == 'Active') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ $user['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user['joined'] }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <button class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-green-600 hover:text-green-900 transition-colors duration-200">
                                    <i class="fas fa-eye"></i>
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

        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">4</span> results
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-2 text-sm bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">Previous</button>
                    <button class="px-3 py-2 text-sm bg-indigo-600 text-white border border-indigo-600 rounded-lg hover:bg-indigo-700 transition-colors duration-200">1</button>
                    <button class="px-3 py-2 text-sm bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection