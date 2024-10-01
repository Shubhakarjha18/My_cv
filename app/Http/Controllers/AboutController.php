<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\About;

class AboutController extends Controller
{
    public function about()
    {
        // Fetch all admins for the dropdown
        $admins = Admin::all();
    
       
    
        // Pass the fetched data to the view
        return view('backend.about.about', compact('admins'));
    }

    public function about_store(Request $request){
        // Validate the request
        $request->validate([
            'admin_id' => 'required|exists:admins,id', // Ensure the admin_id exists in the admins table
           
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'About' => 'required|string',
        ]);
    
        $about = new About();
        $about->admin_id = $request->admin_id; // Store the selected admin ID
       
        $about->about = $request->About;
    
        // Handle the image upload if an image is uploaded
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $about->image = $imageName;
        }
    
        $about->save();

        // Redirect or return response
        return redirect()->back()->with('success', 'Admin created successfully.');
    }
    public function view_about(){
        $admins = Admin::all();
           // Fetch all about details along with the associated admin details
           $aboutDetails = About::with('admin')->get();
        return view('backend.about.view_about', compact('admins', 'aboutDetails'));
    }
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id); // Find the admin record by ID

        

        $admin->delete(); // Delete the admin record

        return redirect()->route('admin.view_about')->with('success', 'Admin record deleted successfully.');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id); // Fetch the admin record
        return view('backend.about.edit_about', compact('admin'));
    }

    // Update the update details
    public function update(Request $request, $id)
{
    $request->validate([
        'about' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $about = About::findOrFail($id);
    $about->about = $request->about;

    // Handle the image upload if a new image is uploaded
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($about->image) {
            \Storage::disk('public')->delete('images/' . $about->image);
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('images', $imageName, 'public');
        $about->image = $imageName;
    }

    $about->save();

    return redirect()->route('admin.view_about')->with('success', 'About section updated successfully.');
}

}
