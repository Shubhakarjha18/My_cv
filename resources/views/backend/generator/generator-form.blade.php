@extends('backend.layouts')
@section('title', 'Animated Text Input')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mx-auto mt-6">
        <div class="bg-white shadow-md rounded-lg">
            <div class="bg-blue-600 text-white p-6 rounded-t-lg">
                <h4 class="text-xl font-bold">Enter Text to Animate</h4>
            </div>
            
            <div class="p-6">
                <!-- Form to input text -->
                <form action="{{route('admin.post.generator')}}" method="POST" id="textForm">
                    @csrf
                          
                    <div class="mb-4">
                        <label for="animateText" class="block text-gray-700 font-bold mb-2">Your Text</label>
                        <input type="text" id="animateText" name="text" placeholder="Enter text to animate" 
                            class="block w-full border border-gray-300 rounded-md shadow-sm p-3 focus:outline-none focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection
