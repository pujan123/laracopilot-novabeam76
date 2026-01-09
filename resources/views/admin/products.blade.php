@extends('layouts.admin')

@section('title', 'Products - Business Solutions Admin')
@section('page-title', 'Product Management')

@section('content')
<div class="space-y-8">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Products</h2>
            <p class="text-gray-600">Manage your services and product offerings</p>
        </div>
        <button class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <i class="fas fa-plus mr-2"></i>Add New Product
        </button>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($data['products'] as $product)
        <div class="admin-card p-6 rounded-2xl shadow-lg card-hover border border-gray-100">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-box text-white"></i>
                </div>
                <span class="px-3 py-1 text-xs rounded-full font-semibold
                    @if($product['status'] == 'Active') bg-green-100 text-green-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                    {{ $product['status'] }}
                </span>
            </div>
            
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $product['name'] }}</h3>
            <p class="text-gray-600 text-sm mb-4">{{ $product['category'] }}</p>
            
            <div class="flex justify-between items-center mb-4">
                <span class="text-2xl font-bold text-indigo-600">{{ $product['price'] }}</span>
                <span class="text-sm text-gray-500">{{ $product['stock'] }}</span>
            </div>
            
            <div class="flex space-x-2">
                <button class="flex-1 bg-indigo-100 text-indigo-600 py-2 rounded-lg hover:bg-indigo-200 transition-colors duration-200">
                    <i class="fas fa-edit mr-1"></i>Edit
                </button>
                <button class="flex-1 bg-green-100 text-green-600 py-2 rounded-lg hover:bg-green-200 transition-colors duration-200">
                    <i class="fas fa-eye mr-1"></i>View
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Products Table -->
    <div class="admin-card rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h3 class="text-xl font-bold text-gray-800">Product List</h3>
                <div class="flex gap-3">
                    <input type="text" placeholder="Search products..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option>All Categories</option>
                        <option>Services</option>
                        <option>Software</option>
                        <option>Tools</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($data['products'] as $product)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-box text-white"></i>
                                </div>
                                <div class="text-sm font-medium text-gray-900">{{ $product['name'] }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product['category'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $product['price'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product['stock'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if($product['status'] == 'Active') bg-green-100 text-green-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $product['status'] }}
                            </span>
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
    </div>
</div>
@endsection