@extends('backend.layouts')
@section('title', 'Animated Texts')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mx-auto mt-6">
        <div class="bg-white shadow-md rounded-lg">
            <div class="p-8 space-y-6"> <!-- Increased padding and spacing -->
                @foreach ($animatedTexts as $animatedText)
                    <div class="bg-gradient-to-r from-blue-500 to-green-500 p-6 rounded-md shadow-lg transform transition duration-300 hover:scale-105">
                        <marquee behavior="scroll" direction="left" scrollamount="5">
                            <h1 class="text-3xl font-extrabold text-white text-center"> <!-- Increased text size -->
                                {{ $animatedText->text }}
                            </h1>
                        </marquee>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection
