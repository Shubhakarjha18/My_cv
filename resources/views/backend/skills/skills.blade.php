@extends('backend.layouts')
@section('title', 'My Skills')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-3">
        <div class="bg-white shadow rounded-lg">
            <div class="p-4 bg-blue-600 text-white rounded-t-lg">
                <h4 class="mb-0">Create Skills</h4>
            </div>
            
            <!-- Success Message -->
            @if (session('success'))
                <div class="p-4 mb-4 bg-green-500 text-white rounded-lg">
                    {{ session('success') }}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="p-4 mb-4 bg-red-500 text-white rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="p-4">
                <form method="POST" action="{{ route('admin.skills.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Admin Selection Dropdown -->
                    <div class="form-group mb-4">
                        <label for="admin_id" class="block text-gray-700">Admin Name</label>
                        <select class="form-control w-100" id="admin_id" name="admin_id">
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Skill Description Textarea -->
                    <div class="form-group mb-4">
                        <label for="skill_name" class="block text-gray-700">Skill Description</label>
                        <textarea class="form-control w-100 h-24" id="skill_name" name="skill_name" placeholder="Enter skill description" required></textarea>
                    </div>
                    

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
