@extends('layouts.dashboard')
@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">
        <div class="max-w-none mx-auto">
            <div class="bg-white overflow-hidden sm:rounded-lg sm:shadow">
                <div class="bg-gray-100 px-4 py-5 border-b border-gray-200 sm:px-6">
                    <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                        <div class="ml-4 mt-2 mb-4 lg:mb-2">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Pending Orders List
                            </h3>
                        </div>
                        @if (session()->has('message'))
                        <div class="-ml-0 -mt-2 flex py-2 px-4 sm:px-2 lg:px-4">
                            <div class="-ml-4 -mt-2 flex">
                                <div class="rounded-md bg-green-50 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 text-green-400"
                                                x-description="Heroicon name: solid/check-circle"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-green-800">
                                                {{ session()->get('message') }}
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="bg-gray-100 py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="flex flex-col">
                            <div class="-my-2 sm:overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        No
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Email
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Quantity
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-100">
                                                @foreach ($orders as $key => $order)
                                                <tr>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $orders->firstItem() + $key }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $order->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{$order->email}}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $order->quantity }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex grid-cols-2">
                                                        <a href="{{ 'orders/'. $order->id}}" class="px-3 ">
                                                            <svg class="w-6 h-6 text-indigo-600" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('orders.destroy', $order->id) }}"
                                                            class="px-3" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button>
                                                                <svg class=" h-6 w-6 text-red-500" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path strokeLinecap="round" strokeLinejoin="round"
                                                                        strokeWidth={2}
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $orders->links('vendor.pagination.tailwind') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
