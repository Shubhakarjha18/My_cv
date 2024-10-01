<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill; // Import the Skill model
use App\Models\Admin; // Import the Admin model

class SkillController extends Controller
{
    /**
     * Show the form for creating a new skill.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Fetch all admins to display in the dropdown
        $admins = Admin::all();
        
        return view('backend.skills.skills', compact('admins'));
    }

    /**
     * Store a newly created skill in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'admin_id' => 'required|exists:admins,id',
            'skill_name' => 'required|string|max:255',
        ]);

        // Create a new skill using the validated data
        Skill::create([
            'admin_id' => $request->admin_id,
            'skills' => $request->skill_name,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.skills.create')->with('success', 'Skill created successfully.');
    }

    public function index()
    {
        // Fetch all skills with related admin information
        $skills = Skill::with('admin')->get();
        return view('backend.skills.view_skills', compact('skills'));
    }

    /**
     * Update the specified skill in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'skill_name' => 'required|string|max:255',
        ]);

        // Find the skill by ID and update it
        $skill = Skill::findOrFail($id);
        $skill->skills = $request->skill_name;
        $skill->save();

        // Redirect back with a success message
        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
    }

    /**
     * Remove the specified skill from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the skill by ID and delete it
        $skill = Skill::findOrFail($id);
        $skill->delete();

        // Redirect back with a success message
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');
    }
}
