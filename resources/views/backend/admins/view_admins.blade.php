@extends('backend.layouts')
@section('title', 'Admin Details')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mx-auto mt-6">
        <!-- Admin Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($admins as $admin)
            <div class="bg-white rounded-lg shadow-lg p-4" id="admin-{{ $admin->id }}">
                <img class="w-24 h-24 mx-auto rounded-full" src="{{ $admin->about ? asset('images/' . $admin->about->image) : asset('default-image.jpg') }}"  alt="Admin Image">
                <div class="text-center mt-4">
                    <h5 class="text-lg font-semibold">{{ $admin->name }}</h5>
                    <!-- Form for enabling the admin -->
                    @if($admin->enabled)
                    <span class="mt-3 inline-block px-4 py-2 bg-green-600 text-white rounded-lg">
                        Enabled
                    </span>
                    @else
                    <button class="enable-admin-btn mt-3 px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-blue-700 transition" data-id="{{ $admin->id }}">
                        Enable
                    </button>
                    @endif
                    <!-- Form for deleting the admin -->
                    <button class="delete-admin-btn mt-3 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition" data-id="{{ $admin->id }}">
                        Delete
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>


@endsection
