{{-- ABOUT ME start --}}

@if($abouts)
    <div class="bg-white shadow-lg rounded-lg p-6">
        <!-- "About Me" heading with a larger font size and boxed style -->
        <div class="text-3xl font-bold text-gray-800 italic bg-gray-200 border-l-4 border-green-600 p-6 rounded-t-lg shadow-md">
            About Me
        </div>

        <!-- Main content: flexbox layout to display text and image side by side -->
        <div class="p-6 flex flex-col md:flex-row">
            <!-- Text section (takes 2/3 width on medium and larger screens) -->
            <div class="md:w-2/3 mb-6 md:mb-0">
                <h5 class="text-2xl font-bold italic text-gray-900">
                    {{ $abouts->admin->name ?? 'Admin not found' }}
                </h5>

                <!-- Larger and boxed "About" text -->
                <p class="mt-4 text-lg text-gray-800 italic bg-gray-100 p-4 rounded-md border border-gray-300">
                    {{ $abouts->about }}
                </p>
            </div>

            <!-- Image section (takes 1/3 width on medium and larger screens) -->
            <div class="md:w-1/3 flex justify-center items-center">
                @if($abouts->image)
                    <!-- Image styling with rounded label below -->
                    <div class="relative">
                        <img src="{{ asset('images/' . $abouts->image) }}" alt="Your Image" class="w-40 h-40 rounded-full border-8 border-blue-600 object-cover">
                        
                        <!-- Rounded label for the image -->
                        <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white text-sm px-4 py-1 rounded-full shadow-md">
                            Admin Image
                        </div>
                    </div>
                @else
                    <span class="text-gray-500">N/A</span>
                @endif
            </div>
        </div>
    </div>
@else
    <p class="text-gray-500">No about information available.</p>
@endif

{{-- ABOUT ME end --}}
<br><br>
