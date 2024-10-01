@extends('backend.layouts')
@section('title', 'Contact Details')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-3">
        <div class="bg-white shadow rounded-lg">
            <div class="p-4 bg-blue-600 text-white rounded-t-lg">
                <h5 class="mb-0 text-center">Contact Details</h5>
            </div>

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
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Phone</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">LinkedIn</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Twitter</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">GitHub</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-700 divide-y divide-gray-600">
                        @foreach($contacts as $contact)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $contact->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $contact->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $contact->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $contact->Linkedn }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $contact->Twitter }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">{{ $contact->Github }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded" 
                                    data-id="{{ $contact->id }}" 
                                    data-email="{{ $contact->email }}"
                                    data-phone="{{ $contact->phone }}"
                                    data-linkdn="{{ $contact->Linkedn }}"
                                    data-twitter="{{ $contact->Twitter }}"
                                    data-github="{{ $contact->Github }}"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#editContactModal">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Edit Contact Modal -->
{{-- <div class="modal fade" id="editContactModal" tabindex="-1" role="dialog" aria-labelledby="editContactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editContactModalLabel">Edit Contact</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('admin.contacts.update') }}" id="editContactForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="contactId" name="id">
                    <div class="form-group">
                        <label for="contactEmail">Email</label>
                        <input type="email" class="form-control" id="contactEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="contactPhone">Phone</label>
                        <input type="text" class="form-control" id="contactPhone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="contactLinkedn">LinkedIn</label>
                        <input type="text" class="form-control" id="contactLinkedn" name="Linkedn" required>
                    </div>
                    <div class="form-group">
                        <label for="contactTwitter">Twitter</label>
                        <input type="text" class="form-control" id="contactTwitter" name="Twitter" required>
                    </div>
                    <div class="form-group">
                        <label for="contactGithub">GitHub</label>
                        <input type="text" class="form-control" id="contactGithub" name="Github" required>
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

@section('scripts')

@endsection
