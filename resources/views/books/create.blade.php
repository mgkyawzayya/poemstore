@extends('layouts.dashboard')
@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="max-w-none mx-auto">
            <div class="relative bg-white">
                <div class="absolute inset-0">
                    <div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50"></div>
                </div>
                <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
                    <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-5 lg:py-24 lg:px-8 xl:pl-12">
                        <div class="max-w-lg mx-auto lg:max-w-none">
                            <form action="{{ route('books.store') }}" method="POST" class="grid grid-cols-1 gap-y-6">
                                @csrf
                                <div>
                                    <label for="name" class="sr-only">Full name</label>
                                    <input type="text" name="name" id="name" autocomplete="name"
                                        class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                        value="{{ old('name') }}" placeholder="Name">
                                    @error('name')
                                    <p class="mt-2 text-sm text-red-600">Name required</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="firstphone" class="sr-only">First Phone One</label>
                                    <input type="text" name="firstphone" id="frstphone" autocomplete="tel"
                                        class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                        value="{{ old('firstphone') }}" placeholder="First Phone">
                                    @error('firstphone')
                                    <p class="mt-2 text-sm text-red-600">Phone Number required</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="secondphone" class="sr-only">Second Phone</label>
                                    <input type="text" name="secondphone" id="secondphone" autocomplete="tel"
                                        class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                        value="{{ old('secondphone') }}" placeholder="Second Phone">
                                </div>
                                <div>
                                    <div>
                                        <label for="image" class="block text-sm font-medium text-gray-700">Photo</label>
                                        <input type="file" name="image" id="image"
                                            class="block w-full shadow-sm py-4 px-4 focus:border-indigo-500 border-gray-300 rounded-md">
                                        @error('image')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <label for="address" class="sr-only">Address</label>
                                    <textarea id="address" name="address" rows="4"
                                        class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                        placeholder="Address">{{ old('address') }}</textarea>
                                    @error('address')
                                    <p class="mt-2 text-sm text-red-600">Addres required</p>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit"
                                        class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(session()->has('message'))
            <div class="bg-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="max-w-7xl mx-auto">
                        <div class="rounded-md bg-green-50 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400"
                                        x-description="Heroicon name: solid/check-circle"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">
                                        {{ session()->get('message') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
