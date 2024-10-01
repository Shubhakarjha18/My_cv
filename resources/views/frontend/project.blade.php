{{-- My Projects --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($projects as $project)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img class="w-full h-48 object-cover" src="{{ asset('images/' . $project->image) }}" alt="{{ $project->Project_name }}">
            <div class="p-4">
                <h5 class="text-xl font-bold mb-2">{{ $project->Project_name }}</h5>
                <p class="text-gray-700 mb-4">{{ $project->Project_Description }}</p>
                <footer class="text-sm text-gray-500">
                    <small>
                        Last updated at <cite title="Source Title">{{ $project->updated_at->format('F j, Y') }}</cite>
                    </small>
                </footer>
            </div>
        </div>
    @endforeach
</div>
{{-- End My Projects --}}
<br>
