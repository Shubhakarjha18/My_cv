<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Admin; // Make sure to import the Admin model

class ContactController extends Controller
{
    public function contact_form()
    {
        $admins = Admin::all();
        return view('backend.contact.contact',compact('admins'));
    }

    public function contact_form_store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
             'admin_id' => 'required|exists:admins,id',
            'email' => 'string|email|max:255|unique:contacts,email|nullable',
            'phone' => 'string|max:15|nullable',
            'Linkedn' => 'string|max:255|nullable',
            'Twitter' => 'string|max:255|nullable',
            'Github' => 'string|max:255|nullable',
        ]);

       

        // Save the data
        Contact::create([
            'admin_id' => $request->admin_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'Linkedn' => $request->Linkedn,
            'Twitter' => $request->Twitter,
            'Github' => $request->Github,
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Contact created successfully.');
    }

    public function view_contact(){
        $admins = Admin::all();
        $contacts = Contact::with('admin')->get();
        return view('backend.contact.view_contact', compact('admins','contacts')); 
    }


    public function updateContact(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:contacts,id',
            'email' => 'string|email|max:255|nullable',
            'phone' => 'string|max:15|nullable',
            'Linkedn' => 'string|max:255|nullable',
            'Twitter' => 'string|max:255|nullable',
            'Github' => 'string|max:255|nullable',
        ]);

        $contact = Contact::findOrFail($request->id);
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->Linkedn = $request->Linkedn;
        $contact->Twitter = $request->Twitter;
        $contact->Github = $request->Github;
        $contact->save();

        return redirect()->route('admin.view_contact')->with('success', 'Contact updated successfully.');
    }
}
