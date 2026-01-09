@extends('layouts.admin')

@section('title', 'Reports - Business Solutions Admin')
@section('page-title', 'Reports & Analytics')

@section('content')
<div class="space-y-8">
    <!-- Report Actions -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Reports</h2>
            <p class="text-gray-600">Generate and download detailed business reports</p>
        </div>
        <button class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <i class="fas fa-plus mr-2"></i>Generate Report
        </button>
    </div>

    <!-- Report Types -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="admin-card p-6 rounded-2xl shadow-lg card-hover border border-gray-100 cursor-pointer">
            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4">
                <i class="fas fa-chart-line text-white"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Sales Report</h3>
            <p class="text-gray-600 text-sm">Comprehensive sales analytics and performance metrics</p>
        </div>
        
        <div class="admin-card p-6 rounded-2xl shadow-lg card-hover border border-gray-100 cursor-pointer">
            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4">
                <i class="fas fa-users text-white"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Customer Report</h3>
            <p class="text-gray-600 text-sm">Customer behavior and engagement analysis</p>
        </div>
        
        <div class="admin-card p-6 rounded-2xl shadow-lg card-hover border border-gray-100 cursor-pointer">
            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4">
                <i class="fas fa-dollar-sign text-white"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Revenue Report</h3>
            <p class="text-gray-600 text-sm">Financial performance and revenue tracking</p>
        </div>
        
        <div class="admin-card p-6 rounded-2xl shadow-lg card-hover border border-gray-100 cursor-pointer">
            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-4">
                <i class="fas fa-box text-white"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Product Report</h3>
            <p class="text-gray-600 text-sm">Product performance and inventory insights</p>
        </div>
    </div>

    <!-- Generated Reports -->
    <div class="admin-card rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h3 class="text-xl font-bold text-gray-800">Generated Reports</h3>
                <div class="flex gap-3">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>All Types</option>
                        <option>Financial</option>
                        <option>Analytics</option>
                        <option>Sales</option>
                        <option>Survey</option>
                    </select>
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>Last 30 days</option>
                        <option>Last 7 days</option>
                        <option>Last 3 months</option>
                        <option>Last year</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Report Name</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Generated</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($data['reports'] as $report)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                                <div class="text-sm font-medium text-gray-900">{{ $report['name'] }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if($report['type'] == 'Financial') bg-green-100 text-green-800
                                @elseif($report['type'] == 'Analytics') bg-blue-100 text-blue-800
                                @elseif($report['type'] == 'Sales') bg-purple-100 text-purple-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $report['type'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $report['generated'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if($report['status'] == 'Ready') bg-green-100 text-green-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $report['status'] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                @if($report['status'] == 'Ready')
                                <button class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200" title="Download">
                                    <i class="fas fa-download"></i>
                                </button>
                                @endif
                                <button class="text-green-600 hover:text-green-900 transition-colors duration-200" title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-900 transition-colors duration-200" title="Delete">
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

    <!-- Report Builder -->
    <div class="admin-card p-6 rounded-2xl shadow-lg border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Custom Report Builder</h3>
        
        <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Report Type</label>
                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>Sales Report</option>
                    <option>Customer Report</option>
                    <option>Revenue Report</option>
                    <option>Product Report</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 3 months</option>
                    <option>Last year</option>
                    <option>Custom range</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Format</label>
                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option>PDF</option>
                    <option>Excel</option>
                    <option>CSV</option>
                </select>
            </div>
            
            <div class="flex items-end">
                <button type="submit" class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300">
                    <i class="fas fa-chart-bar mr-2"></i>Generate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection