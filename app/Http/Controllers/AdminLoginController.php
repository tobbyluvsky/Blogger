<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller{

   //admin login
    public function adminLogin(){
        return view('admin.auth.login');
    }

    //admin dashboard
    public function adminDashboard(){
        return view('admin.dashboard');
    }
}
