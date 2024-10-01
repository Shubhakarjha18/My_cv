@extends('backend.layouts')
@section('title', 'Education Details')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-3">
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="p-4 bg-blue-600 text-white">
                <h5 class="mb-0 text-center">Education Details</h5>
            </div>
            <table class="min-w-full bg-gray-800 text-white">
                <thead>
                    <tr>
                        <th class="py-3 px-4 text-left">#</th>
                        <th class="py-3 px-4 text-left">Name</th>
                        <th class="py-3 px-4 text-left">Level</th>
                        <th class="py-3 px-4 text-left">College</th>
                        <th class="py-3 px-4 text-left">Location</th>
                        <th class="py-3 px-4 text-left">GPA</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($educationDetails as $education)
                    <tr class="bg-gray-700 hover:bg-gray-600">
                        <td class="py-4 px-4">{{ $education->id }}</td>
                        <td class="py-4 px-4">{{ $education->admin->name }}</td>
                        <td class="py-4 px-4">{{ $education->Level }}</td>
                        <td class="py-4 px-4">{{ $education->college }}</td>
                        <td class="py-4 px-4">{{ $education->Location }}</td>
                        <td class="py-4 px-4">{{ $education->GPA }}</td>
                        <td class="py-4 px-4">
                            <button class="bg-yellow-500 text-white rounded px-2 py-1 edit-education-btn" 
                                data-id="{{ $education->id }}" 
                                data-level="{{ $education->Level }}"
                                data-college="{{ $education->college }}"
                                data-location="{{ $education->Location }}"
                                data-gpa="{{ $education->GPA }}"
                                data-bs-toggle="modal" 
                                data-bs-target="#editEducationModal">
                                Edit
                            </button>
                            <form action="#" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white rounded px-2 py-1" onclick="return confirm('Are you sure you want to delete this record?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Edit Education Modal -->
{{-- <div class="modal fade" id="editEducationModal" tabindex="-1" role="dialog" aria-labelledby="editEducationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEducationModalLabel">Edit Education</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.update_education', ['id' => ':id']) }}" id="editEducationForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="educationId" name="id">
                    <div class="form-group">
                        <label for="educationLevel">Level</label>
                        <input type="text" class="form-control" id="educationLevel" name="level" required>
                    </div>
                    <div class="form-group">
                        <label for="educationCollege">College</label>
                        <input type="text" class="form-control" id="educationCollege" name="college" required>
                    </div>
                    <div class="form-group">
                        <label for="educationLocation">Location</label>
                        <input type="text" class="form-control" id="educationLocation" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="educationGPA">GPA</label>
                        <input type="text" class="form-control" id="educationGPA" name="gpa" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

@endsection
