@extends('layouts')
@section('title', 'Admin Login')

<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg max-w-md w-full">
        <div class="bg-green-500 text-white text-center py-4 rounded-t-lg">
            <h2 class="text-lg font-semibold">!! LOGIN HERE !!!</h2>
        </div>
        <div class="bg-green-500 text-white text-center py-4 rounded-t-lg">
<a href="{{ route("admin.signup")}}">Signup</a>
        </div>
        <div class="p-6">
            <form id="loginForm" action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="flex items-center mb-4">
                    <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600" id="remember" name="remember">
                    <label class="ml-2 block text-gray-700 text-sm">Remember Me</label>
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-200 ease-in-out">Login</button>
                </div>
            </form>

            <!-- Error Display Area -->
            <div id="loginErrors" class="mt-4"></div>
        </div>
    </div>
</div>


