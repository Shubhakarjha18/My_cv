@extends('backend.layouts')
@section('title', 'About Details')
@section('content')

<main class="flex-1 p-6">
    <div class="container mx-auto mt-4">
        <!-- Display Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <button type="button" class="text-green-700" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                </span>
            </div>
        @endif

        <!-- Display Error Message -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <button type="button" class="text-red-700" data-bs-dismiss="alert" aria-label="Close">&times;</button>
                </span>
            </div>
        @endif

        <!-- About Details Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mt-4">
            <div class="bg-blue-600 text-white p-4">
                <h4 class="mb-0">About Details</h4>
            </div>
            <div class="p-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Admin Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">About</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($aboutDetails as $about)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $about->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $about->admin->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($about->about, 50) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($about->image)
                                        <img src="{{ asset('images/' . $about->image) }}" alt="Admin Image" class="w-20 h-20 object-cover rounded-full border border-blue-500">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <button class="bg-yellow-500 text-white rounded px-2 py-1 text-sm edit-about-btn" data-id="{{ $about->id }}" data-about="{{ $about->about }}" data-image="{{ $about->image }}" data-bs-toggle="modal" data-bs-target="#editAboutModal">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.destroy', $about->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white rounded px-2 py-1 text-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>




@endsection

