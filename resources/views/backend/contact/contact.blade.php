@extends('backend.layouts')
@section('title', 'Contact')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-3">
        <div class="bg-white shadow rounded-lg">
            <div class="p-4 bg-blue-600 text-white rounded-t-lg">
                <h5 class="mb-0">Create Contact Details</h5>
            </div>

            <!-- Success Message -->
            @if (session('success'))
            <div class="p-4 bg-green-500 text-white rounded-lg" role="alert">
                {{ session('success') }}
                <button type="button" class="float-right text-white" onclick="this.parentElement.style.display='none'">&times;</button>
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
                <form method="POST" action="{{ route('admin.contacts.store') }}" enctype="multipart/form-data">
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
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" class="border border-gray-300 rounded-md w-full p-2" id="email" name="email" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700">Phone</label>
                        <input type="text" class="border border-gray-300 rounded-md w-full p-2" id="phone" name="phone" required>
                    </div>

                    <div class="mb-4">
                        <label for="Linkedn" class="block text-gray-700">LinkedIn</label>
                        <input type="text" class="border border-gray-300 rounded-md w-full p-2" id="Linkedn" name="Linkedn">
                    </div>

                    <div class="mb-4">
                        <label for="Twitter" class="block text-gray-700">Twitter</label>
                        <input type="text" class="border border-gray-300 rounded-md w-full p-2" id="Twitter" name="Twitter">
                    </div>

                    <div class="mb-4">
                        <label for="Github" class="block text-gray-700">GitHub</label>
                        <input type="text" class="border border-gray-300 rounded-md w-full p-2" id="Github" name="Github">
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white rounded-md px-4 py-2 w-full">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
