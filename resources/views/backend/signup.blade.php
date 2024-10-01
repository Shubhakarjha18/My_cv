@extends('layouts')
@section('title', 'Create Admin')

{{-- Signup form --}}
<div class="container mx-auto mt-10">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg">
                <div class="px-6 py-4 border-b">
                    <h2 class="text-lg font-semibold">Admin Signup</h2>
                </div>

                <div class="p-6">
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-500 text-white rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="signupForm" method="POST" action="{{ route('admin.signup.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Name</label>
                            <input type="text" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Password</label>
                            <input type="password" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="password" name="password" required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                            <input type="password" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div>
                            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-200">
                                Signup
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
