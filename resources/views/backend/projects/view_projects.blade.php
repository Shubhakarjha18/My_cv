@extends('backend.layouts')
@section('title', 'Projects Details')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-3">
        <!-- Display Success Message -->
        @if (session('success'))
            <div class="p-4 mb-4 bg-green-500 text-white rounded-lg">
                {{ session('success') }}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Display Error Message -->
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

        <!-- Projects Table -->
        <div class="bg-white shadow rounded-lg">
            <div class="p-4 bg-blue-600 text-white rounded-t-lg">
                <h4 class="mb-0">Projects Details</h4>
            </div>
            <div class="p-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Admin Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Project Description</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($projects as $project)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $project->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $project->admin->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $project->Project_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $project->Project_Description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <button class="btn btn-warning edit-project-btn" 
                                        data-id="{{ $project->id }}" 
                                        data-project_name="{{ $project->Project_name }}" 
                                        data-project_description="{{ $project->Project_Description }}" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editProjectModal">
                                        Edit
                                    </button>
                                    {{-- <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">
                                            Delete
                                        </button>
                                    </form> --}}
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
<!-- Edit Project Modal -->
{{-- <div class="modal fade" id="editProjectModal" tabindex="-1" role="dialog" aria-labelledby="editProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProjectModalLabel">Edit Project</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.projects.update', 0) }}" id="editProjectForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="projectId" name="id">
                    <div class="form-group">
                        <label for="projectName">Project Name</label>
                        <input type="text" class="form-control" id="projectName" name="Project_name" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="projectDescription">Project Description</label>
                        <textarea class="form-control" id="projectDescription" name="Project_Description" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



@section('scripts')
<script>
    // Populate the edit modal with data
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-project-btn');
        const editProjectForm = document.getElementById('editProjectForm');
        const projectIdInput = document.getElementById('projectId');
        const projectNameInput = document.getElementById('projectName');
        const projectDescriptionInput = document.getElementById('projectDescription');

        editButtons.forEac --}}
