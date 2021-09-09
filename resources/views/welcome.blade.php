@extends('layouts.app')
@section('content')
<div class="bg-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="space-y-4">
                <div class="aspect-w-3 aspect-h-2">
                    <img class="object-contain shadow-lg rounded-lg" src="{{ asset('book.jpg') }}" alt="">
                </div>
            </div>
            <form class="space-y-8 divide-gray-200" action="{{ route('orders.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="space-y-8 divide-y divide-gray-200">
                    <div class="pt-8">
                        <div>
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Order Information
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Use a permanent email address where you can receive mail.
                            </p>
                        </div>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Name
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name" autocomplete="given-name"
                                        value="{{ old('name') }}"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    @error('name')
                                    <p class="mt-2 text-sm text-red-600">Name required</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">
                                    Email address
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        value="{{ old('email') }}"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="price" class="block text-sm font-medium text-gray-700">
                                    Price
                                </label>
                                <div class="mt-1">
                                    <input type="number" readonly="readonly" value="2000" name="price" id="price"
                                        autocomplete="price"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">
                                    Quantity
                                </label>
                                <div class="mt-1">
                                    <input type="number" value="1" name="quantity" id="name" autocomplete="price"
                                        min="0"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                    @error('quantity')
                                    <p class="mt-2 text-sm text-red-600">Quantity should not be zero.</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="sm:col-span-4">
                                <fieldset>
                                    <div>
                                        <legend class="text-base font-medium text-gray-900">
                                            Bank Accounts
                                        </legend>
                                        <p class="text-sm text-gray-500">You can copy bank account number by clicking
                                            text</p>
                                    </div>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex items-center mb-8">
                                            <label for="push-everything"
                                                onClick="navigator.clipboard.writeText('20018113379')"
                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                AYA - 20018113379
                                            </label>
                                        </div>
                                        <div class="flex items-center mb-12">
                                            <label for="push-email"
                                                onClick="navigator.clipboard.writeText('09794555114')"
                                                class="ml-3 block text-sm font-medium text-gray-700">
                                                KPAY - 09794555114
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="sm:col-span-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">
                                    Payment Slip
                                </label>
                                <div class="mt-6">
                                    <input type="file" name="image" placeholder="Payment">
                                    @error('image')
                                    <p class="mt-2 text-sm text-red-600">Payment Slip required.</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Confirm
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("input[name='quantity']").on('keyup mouseup', function() {
        var qty = $("input[name='quantity']").val();

        if (qty > 0) {
            price = 2000;
        } else {
            price = 0;
        }
        newprice = price * parseInt( qty );
        $("input[name='price']").val( newprice.toFixed(0) );
        });
    });
</script>
@endsection
