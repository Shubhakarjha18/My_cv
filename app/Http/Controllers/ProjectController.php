<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Project;

class ProjectController extends Controller
{
    public function project_form(){
        $admins = Admin::all();
        return view('backend.projects.projects',compact('admins'));
    }

    public function project_form_store(Request $request){

        //validate data
        $validatedData = $request->validate([
           'admin_id' => 'required|exists:admins,id',
            'Project_name' => 'string|max:255|nullable',
            'Project_Description' => 'string|nullable',
        ]);

       

        // Save the data
        Project::create([
        
            'admin_id' => $request->admin_id,

            'Project_name' => $request->Project_name,
            'Project_Description' => $request->Project_Description,
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Projects created successfully.');
    }

    public function view_projects()
    {
        // Fetch all projects with their associated admin
        $projects = Project::with('admin')->get();

        return view('backend.projects.view_projects', compact('projects'));
    }

    public function updateProjects(Request $request){
        $validatedData = $request->validate([
            'id' => 'required|exists:admins,id',
             'Project_name' => 'string|max:255|nullable',
             'Project_Description' => 'string|nullable',
         ]);
 
        
 
         // Save the data
         
         $project = Project::findOrFail($request->id);
         $project->Project_name = $request->Project_name;
         $project->Project_Description = $request->Project_Description;
         $project->save();

         return redirect()->route('admin.view-projects')->with('success', 'Projects updated successfully.');
         
    }
}
