{{-- Skills Section --}}

<div class="max-w-4xl mx-auto bg-white text-black rounded-lg shadow-lg mb-6">
    <div class="p-4 border-b border-gray-700">
        <h5 class="text-2xl font-bold italic text-center">Skills</h5>
    </div>
    <div class="p-6">
        <ul class="list-disc list-inside space-y-2">
            @foreach($skills as $skill)
                <li class="bg-gradient-to-r from-indigo-600 to-red-500 p-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <p class="text-center text-white font-semibold text-lg">{{ $skill->skills }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</div>

{{-- Skills Section --}}
<br>
