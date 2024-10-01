@extends('backend.layouts')
@section('title', 'About Me')
@section('content')
<main class="flex-1 p-6">
    <div class="container mt-5">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-center mb-4">
                <h2 class="text-2xl font-bold">Create About Details</h2>
            </div>

            <!-- Success Message -->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- Error Message -->
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.about_store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="admin_id" class="block text-gray-700 text-sm font-bold mb-2">Admin Name</label>
                    <select class="form-select block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="admin_id" name="admin_id">
                        @foreach($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                    <input type="file" class="form-control-file block w-full text-gray-700 border rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="image" name="image">
                </div>

                <div class="mb-4">
                    <label for="About" class="block text-gray-700 text-sm font-bold mb-2">About</label>
                    <textarea class="form-control block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="About" name="About" rows="4"></textarea>
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 ease-in-out">Submit</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
