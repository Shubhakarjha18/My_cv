<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard');
    }

    


}