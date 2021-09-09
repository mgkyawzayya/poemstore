@extends('layouts.dashboard')
@section('content')
<div class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div>
            <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/users"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Pending-Orders</p>
                    </dt>
                    <dd class="ml-16 pb-3 flex items-baseline sm:pb-4">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ $pending_orders }}
                        </p>
                    </dd>
                </div>
                <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/users"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Accepted Orders</p>
                    </dt>
                    <dd class="ml-16 pb-3 flex items-baseline sm:pb-4">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ $orders }}
                        </p>
                    </dd>
                </div>
                <div class="relative bg-white pt-5 px-4 pb-12 sm:pt-6 sm:px-6 shadow rounded-lg overflow-hidden">
                    <dt>
                        <div class="absolute bg-indigo-500 rounded-md p-3">
                            <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/users"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <p class="ml-16 text-sm font-medium text-gray-500 truncate">Total Price</p>
                    </dt>
                    <dd class="ml-16 pb-3 flex items-baseline sm:pb-4">
                        <p class="text-2xl font-semibold text-gray-900">
                            {{ number_format($total_price) }}
                        </p>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
