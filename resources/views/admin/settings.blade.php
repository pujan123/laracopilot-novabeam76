@extends('layouts.admin')

@section('title', 'Settings - Business Solutions Admin')
@section('page-title', 'System Settings')

@section('content')
<div class="space-y-8">
    <!-- Settings Navigation -->
    <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
        <div class="flex space-x-8 border-b border-gray-200">
            <button class="pb-4 px-2 border-b-2 border-indigo-600 text-indigo-600 font-medium">General</button>
            <button class="pb-4 px-2 text-gray-500 hover:text-gray-700 font-medium">Security</button>
            <button class="pb-4 px-2 text-gray-500 hover:text-gray-700 font-medium">Notifications</button>
            <button class="pb-4 px-2 text-gray-500 hover:text-gray-700 font-medium">Integrations</button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- General Settings -->
        <div class="lg:col-span-2">
            <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
                <h3 class="text-xl font-bold text-gray-800 mb-6">General Settings</h3>
                
                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Name</label>
                        <input type="text" value="{{ $data['settings']['site_name'] }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Admin Email</label>
                        <input type="email" value="{{ $data['settings']['site_email'] }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Description</label>
                        <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Describe your business..."></textarea>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-800">Maintenance Mode</h4>
                            <p class="text-sm text-gray-600">Put the site in maintenance mode</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" {{ $data['settings']['maintenance_mode'] ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                    
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div>
                            <h4 class="font-medium text-gray-800">Email Notifications</h4>
                            <p class="text-sm text-gray-600">Receive email notifications for important events</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" {{ $data['settings']['notifications'] ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                    
                    <div class="flex space-x-4">
                        <button type="submit" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300">
                            Save Changes
                        </button>
                        <button type="button" class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg font-semibold hover:bg-gray-300 transition-colors duration-300">
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="space-y-6">
            <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <button class="w-full bg-blue-100 text-blue-600 py-3 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                        <i class="fas fa-database mr-2"></i>Backup Database
                    </button>
                    <button class="w-full bg-green-100 text-green-600 py-3 rounded-lg hover:bg-green-200 transition-colors duration-200">
                        <i class="fas fa-broom mr-2"></i>Clear Cache
                    </button>
                    <button class="w-full bg-yellow-100 text-yellow-600 py-3 rounded-lg hover:bg-yellow-200 transition-colors duration-200">
                        <i class="fas fa-sync mr-2"></i>Update System
                    </button>
                    <button class="w-full bg-red-100 text-red-600 py-3 rounded-lg hover:bg-red-200 transition-colors duration-200">
                        <i class="fas fa-exclamation-triangle mr-2"></i>Reset Settings
                    </button>
                </div>
            </div>

            <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">System Info</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Version:</span>
                        <span class="font-medium">2.1.0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">PHP Version:</span>
                        <span class="font-medium">8.2.0</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Laravel:</span>
                        <span class="font-medium">10.x</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Database:</span>
                        <span class="font-medium">MySQL 8.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection