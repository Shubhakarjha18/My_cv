@extends('backend.layouts')
@section('title', 'Skills Details')
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

        <!-- Skills Table -->
        <div class="bg-white shadow rounded-lg">
            <div class="p-4 bg-blue-600 text-white rounded-t-lg">
                <h4 class="mb-0">Skills Details</h4>
            </div>
            <div class="p-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Admin Name</th>
                            <th class="px-4 py-2">Skill Name</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skills as $skill)
                            <tr class="hover:bg-gray-200">
                                <td class="border px-4 py-2">{{ $skill->id }}</td>
                                <td class="border px-4 py-2">{{ $skill->admin->name }}</td>
                                <td class="border px-4 py-2">{{ $skill->skills }}</td>
                                <td class="border px-4 py-2">
                                    <button class="btn btn-warning edit-skill-btn" 
                                        data-id="{{ $skill->id }}" 
                                        data-skill_name="{{ $skill->skills }}" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editSkillModal">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">
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
    </div>
</main>

<!-- Edit Skill Modal -->
{{-- Uncomment and implement the modal if needed --}}
{{-- <div class="modal fade" id="editSkillModal" tabindex="-1" role="dialog" aria-labelledby="editSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSkillModalLabel">Edit Skill</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.skills.update', 0) }}" id="editSkillForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="skillId" name="id">
                    <div class="form-group">
                        <label for="skillName">Skill Name</label>
                        <input type="text" class="form-control" id="skillName" name="skill_name" required>
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

{{-- <!-- Edit Skill Modal -->
<div class="modal fade" id="editSkillModal" tabindex="-1" role="dialog" aria-labelledby="editSkillModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSkillModalLabel">Edit Skill</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.skills.update', 0) }}" id="editSkillForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="skillId" name="id">
                    <div class="form-group">
                        <label for="skillName">Skill Name</label>
                        <input type="text" class="form-control" id="skillName" name="skill_name" required>
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

 --}}
