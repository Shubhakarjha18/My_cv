@extends('backend.layouts')
@section('title', 'My Projects')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-3">
        <div class="bg-white shadow rounded-lg">
            <div class="p-4 bg-blue-600 text-white rounded-t-lg">
                <h5 class="mb-0">Create Projects</h5>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="p-4 bg-green-500 text-white rounded-lg">
                    {{ session('success') }}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="p-4 bg-red-500 text-white rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="p-4">
                <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Admin Selection Dropdown with Name -->
                    <div class="form-group mb-4">
                        <label for="admin_id" class="block text-sm font-medium text-gray-700">Admin Name</label>
                        <select class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="admin_id" name="admin_id">
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="Project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input type="text" class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="Project_name" name="Project_name">
                    </div>

                    <div class="form-group mb-4">
                        <label for="Project_Description" class="block text-sm font-medium text-gray-700">Project Description</label>
                        <textarea class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="Project_Description" name="Project_Description" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 focus:outline-none">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
