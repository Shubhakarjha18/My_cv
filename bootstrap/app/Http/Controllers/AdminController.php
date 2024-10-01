<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showSignupForm()
    {
        return view('backend.signup');
    }

    /**
     * Handle the signup form submission.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new admin
        Admin::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to a page or show a success message
        return redirect()->route('dashboard')->with('success', 'Admin account created successfully.');
    }
    public function login(){
        return view('backend.login');
    }
    public function login_post(Request $request){
         // Validate the form data
         $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password], $request->remember)) {
            // If successful, redirect to intended location
            return redirect()->route('dashboard'); // Adjust this to the intended route
        }

        // If unsuccessful, redirect back with input and error message
        return back()->withInput($request->only('name', 'remember'))
                     ->withErrors(['name' => 'These credentials do not match our records.']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function view_admin(){
        $admins = Admin::all();
        return view('backend.admins.view_admins', compact('admins'));
    }

    public function update_admin(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->save();
    
        return redirect()->route('admin.view_admin')->with('success', 'Admin updated successfully.');
    }
}
