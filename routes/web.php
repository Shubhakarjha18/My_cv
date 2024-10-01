<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\skillController;
use App\Models\Admin;
use App\Models\About;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Contact;


Route::get('/', function () {
    // Fetch the enabled admin only
    $admin = Admin::where('enabled', true)->first(); // Get the first enabled admin

    // Fetch about details for the enabled admin
    $abouts = $admin ? About::where('admin_id', $admin->id)->first() : null;

    // Check if $abouts is not null or false
    if ($abouts) {
        $educations = Education::where('admin_id', $admin->id)->get();
        $skills = Skill::where('admin_id', $admin->id)->get(); // Fetch skills related to the admin
        $projects = Project::where('admin_id', $admin->id)->get(); // Fetch projects related to the admin
        $contacts = Contact::where('admin_id', $admin->id)->get(); // Fetch contact details related to the admin
    } else {
        $educations = collect(); // Empty collection if $abouts is not found
        $skills = collect(); // Empty collection if $abouts is not found
        $projects = collect(); // Empty collection if $abouts is not found
        $contacts = collect(); // Empty collection if $abouts is not found
    }

    // Return the view with the fetched data
    return view('welcome', compact('admin', 'abouts', 'educations', 'skills', 'projects', 'contacts'));
})->name('homepage');






Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');
// Route to handle the login form submission
Route::post('/admin', [AdminController::class, 'login_post'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Signup Routes
Route::get('admin/signup', [AdminController::class, 'showSignupForm'])->name('admin.signup');
Route::post('admin/signup', [AdminController::class, 'store'])->name('admin.signup.store');

// Route::middleware(['isAdmin'])->group(function () {
Route::get('/admin/view-admin', [AdminController::class, 'view_admin'])->name('admin.view_admin');
Route::put('/admin/{id}', [AdminController::class, 'update_admin'])->name('admin.update');
Route::post('/admin/enable/{id}', [AdminController::class, 'enable'])->name('admin.enable');
Route::post('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');


Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/admin/education', [EducationController::class, 'education_form'])->name('admin.education');
Route::post('/admin/education', [EducationController::class, 'education_form_store'])->name('admin.education.store');
Route::get('/admin/view-education', [EducationController::class, 'view_education'])->name('admin.view_education');
Route::put('/admin/view-education/{id}', [EducationController::class, 'updateEducation'])->name('admin.update_education');


Route::get('/admin/about', [AboutController::class, 'about'])->name('admin.about');
Route::post('/admin/about', [AboutController::class, 'about_store'])->name('admin.about_store');

Route::get('/admin/view-about', [AboutController::class, 'view_about'])->name('admin.view_about');
Route::delete('/admin/view-about/{id}', [AboutController::class, 'destroy'])->name('admin.destroy');
Route::put('/admin/view-about/{id}', [AboutController::class, 'update'])->name('admin.update_about');



Route::get('/admin/my-projects', [ProjectController::class, 'project_form'])->name('admin.projects');
Route::post('/admin/my-projects', [ProjectController::class, 'project_form_store'])->name('admin.projects.store');
Route::get('/admin/view-projects', [ProjectController::class, 'view_projects'])->name('admin.view-projects');
Route::put('/admin/projects/update', [ProjectController::class, 'updateProjects'])->name('admin.projects.update');

Route::get('/admin/my-contacts', [ContactController::class, 'contact_form'])->name('admin.contacts');
Route::post('/admin/my-contacts', [ContactController::class, 'contact_form_store'])->name('admin.contacts.store');
Route::get('/admin/view-contact', [ContactController::class, 'view_contact'])->name('admin.view_contact');
Route::put('/admin/contacts/update', [ContactController::class, 'updateContact'])->name('admin.contacts.update');




Route::get('/admin/skills/create', [skillController::class, 'create'])->name('admin.skills.create');
Route::post('/admin/skills', [skillController::class, 'store'])->name('admin.skills.store');

// Route to display the list of skills
Route::get('/admin/skills', [skillController::class, 'index'])->name('admin.skills.index');

// Route to update the skill
Route::put('/admin/skills/{id}', [skillController::class, 'update'])->name('admin.skills.update');

// Route to delete the skill
Route::delete('/admin/skills/{id}', [skillController::class, 'destroy'])->name('admin.skills.destroy');
// });

Route::get('/admin/text-generator-form',[DashboardController::class, 'generator'])->name('admin.generator');
Route::post('/admin/text-generator-form',[DashboardController::class, 'generator_store'])->name('admin.post.generator');