<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Education;

class EducationController extends Controller
{

    public function education_form(){
        $admins = Admin::all();
        return view('backend.education.education', compact('admins'));
    }
    public function education_form_store(Request $request){
        $validatedData = $request->validate([
            'admin_id' => 'required|exists:admins,id', // Validate that the admin_name is required and is a string
            'Level' => 'string|max:255|nullable',
            'college' => 'string|max:255|nullable',
            'Location' => 'string|max:255|nullable',
            'GPA' => 'string|max:255|nullable',
        ]);

        Education::create([
            'admin_id' => $request->admin_id, // Store the selected admin's name
            'Level' => $request->Level,
            'college' => $request->college,
            'Location' => $request->Location,
            'GPA' => $request->GPA,
        ]);

        return redirect()->back()->with('success', 'Education details created successfully.');
    }
    public function view_education(){
        $admins = Admin::all();
        $educationDetails = Education::with('admin')->get();
        return view('backend.education.view_education', compact('admins','educationDetails'));
    }

    public function updateEducation(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:educations,id',
            'level' => 'required|string|max:50',
            'college' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'gpa' => 'required|string|max:10',
        ]);
    
        $education = Education::findOrFail($request->id);
        $education->Level = $request->level;
        $education->college = $request->college;
        $education->Location = $request->location;
        $education->GPA = $request->gpa;
        $education->save();
    
        return redirect()->route('admin.view_education')->with('success', 'Education updated successfully.');
    }
    

}
