<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller{

   //admin login
    public function adminLogin(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
            if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password' =>$data['password']])){
                return redirect('/admin/dashboard');
            }else{
                return redirect()->back();
            }
        }
        return view('admin.auth.login');
    }

    //admin dashboard
    public function dashboard(){
        return view('admin.dashboard');
    }

    //admin logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}

