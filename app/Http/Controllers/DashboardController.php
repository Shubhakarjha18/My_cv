<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\AnimatedText;

class DashboardController extends Controller
{
    public function dashboard(){
        $animatedTexts = AnimatedText::all();
        return view('backend.dashboard',compact('animatedTexts'));
    }

    public function generator(){
        return view('backend.generator.generator-form');
    }

    public function generator_store(Request $request)
    {
        // Validate the request
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        // Store the animated text in the database
        AnimatedText::create([
            'text' => $request->input('text'),
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Text has been successfully added!');
    }


}