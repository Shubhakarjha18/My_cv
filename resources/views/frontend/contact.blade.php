{{-- Contact Details --}}
@if(!$contacts->isEmpty())
    <div class="max-w-md mx-auto bg-gray-800 text-white rounded-lg shadow-lg mb-6">
        <div class="p-4">
            <h5 class="text-xl font-bold mb-4">Contact Details</h5>
            @foreach($contacts as $contact)
                <div class="mb-4">
                    <p class="flex items-center">
                        <strong class="mr-2">Email:</strong>
                        <span class="text-gray-300">{{ $contact->email }}</span>
                    </p>
                    <p class="flex items-center">
                        <strong class="mr-2">Phone:</strong>
                        <span class="text-gray-300">{{ $contact->phone }}</span>
                    </p>
                    <p class="flex items-center">
                        <strong class="mr-2">LinkedIn:</strong>
                        <span class="text-gray-300">{{ $contact->Linkedn }}</span>
                    </p>
                    <p class="flex items-center">
                        <strong class="mr-2">Twitter:</strong>
                        <span class="text-gray-300">{{ $contact->Twitter }}</span>
                    </p>
                    <p class="flex items-center">
                        <strong class="mr-2">GitHub:</strong>
                        <span class="text-gray-300">{{ $contact->Github }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endif
{{-- End Contact Details --}}
<br>
