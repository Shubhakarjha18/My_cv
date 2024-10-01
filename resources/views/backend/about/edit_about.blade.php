<!-- resources/views/admin/edit.blade.php -->
@extends('backend.layouts')
@section('title', 'Edit Admin Details')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h1>Edit Admin Details</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admin->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="about" class="form-label">About</label>
                <textarea class="form-control" id="about" name="about">{{ old('about', $admin->About) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if ($admin->image)
                    <img src="{{ asset('storage/' . $admin->image) }}" alt="Admin Image" class="img-fluid mt-3" style="max-width: 150px;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Admin</button>
        </form>
    </div>
</main>
@endsection
