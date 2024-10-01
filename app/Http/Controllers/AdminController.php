<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Services\DeleteService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    protected $deleteService;

    public function __construct(DeleteService $deleteService)
    {
        $this->deleteService = $deleteService;
    }

    // Other methods...

    public function delete($id)
    {
        if ($this->deleteService->deleteRecord(Admin::class, $id)) {
            return response()->json(['success' => true, 'message' => 'Admin deleted successfully.']);}

       
    }


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
             'name' => 'required|string|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new admin
        Admin::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to a page or show a success message
        return response()->json(['success' => true, 'redirect' => route('dashboard')]);
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
            return response()->json(['success' => true, 'redirect' => route('dashboard')]);
        }
// If login fails, return error messages
return response()->json([
    'success' => false,
    'errors' => [
        'name' => ['The provided credentials do not match our records.'],
    ]
]);
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
        $admins = Admin::with('about')->get();
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
    public function enable($id)
    {
        // Disable all other admins first
        Admin::where('enabled', true)->update(['enabled' => false]);
    
        // Find the specific admin by ID
        $admin = Admin::find($id); // Use find() to get the admin by ID
    
        // Check if the admin exists
        if ($admin) {
            // Enable the selected admin
            $admin->enabled = true; // Assuming you have an 'enabled' field in your 'admins' table
            $admin->save();
            
            return response()->json(['success' => true, 'message' => 'Admin enabled successfully.']);
        } else {
            return redirect()->back()->with('error', 'Admin not found!');
        }
    }
    
}
