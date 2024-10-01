@extends('backend.layouts')
@section('title', 'Education Details')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-3">
        <div class="bg-white shadow rounded-lg">
            <div class="bg-blue-600 text-white rounded-t-lg p-4">
                <h5 class="mb-0">Create Education Details</h5>
            </div>
            <!-- Success Message -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('success') }}
                    <button type="button" class="absolute top-0 right-0 px-4 py-3 text-green-700" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                </div>
            @endif
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="absolute top-0 right-0 px-4 py-3 text-red-700" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                </div>
            @endif

            <div class="p-6">
                <form method="POST" action="{{ route('admin.education.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Admin Selection Dropdown with Name -->
                    <div class="mb-4">
                        <label for="admin_id" class="block text-gray-700">Admin Name</label>
                        <select class="border border-gray-300 rounded-md w-full p-2" id="admin_id" name="admin_id">
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="Level" class="block text-gray-700">Level</label>
                        <select class="border border-gray-300 rounded-md w-full p-2" id="Level" name="Level">
                            <option value="SLC" {{ old('Level') == 'SLC' ? 'selected' : '' }}>SLC</option>
                            <option value="Intermediate" {{ old('Level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="Bachelor" {{ old('Level') == 'Bachelor' ? 'selected' : '' }}>Bachelor</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="college" class="block text-gray-700">College</label>
                        <input type="text" class="border border-gray-300 rounded-md w-full p-2" id="college" name="college">
                    </div>

                    <div class="mb-4">
                        <label for="Location" class="block text-gray-700">Location</label>
                        <input type="text" class="border border-gray-300 rounded-md w-full p-2" id="Location" name="Location">
                    </div>

                    <div class="mb-4">
                        <label for="GPA" class="block text-gray-700">GPA</label>
                        <input type="text" class="border border-gray-300 rounded-md w-full p-2" id="GPA" name="GPA">
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-blue-600 text-white rounded-md px-4 py-2 hover:bg-blue-500 transition">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
