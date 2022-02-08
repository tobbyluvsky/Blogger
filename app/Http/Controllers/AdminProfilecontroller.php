<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminProfilecontroller extends Controller
{
    public function profile(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile',compact('admin'));
    }

    public function profileUpdate(Request $request, $id){
        $data = $request->all();
        $rule = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'address' => 'required',
        ];
        $customMessages = [
         'name.required' => 'Please enter the Name',
         'name.max' => 'you are not allowed to enter more than 255 characters',
         'email.required' => 'Please enter email address',
            'email.max' => 'you are not allowed to enter more than 255 characters',
            'email.email' => 'Please enter a valid email address',
            'phone.required' => 'Please enter phone number',
            'address.required' => 'Please enter  address',

        ];

        $this->validate($request,$rule,$customMessages);

        $admin_id = Auth::guard('admin')->user()->id;
        $admin = Admin::findorFail($admin_id);
        $admin->name = $data['name'];
        $admin->email = $data['email'];
        $admin->phone = $data['phone'];
        $admin->address = $data['address'];
        $admin->save();
        Session::flash('success_message','Admin profile updated successfully');
        return redirect()->back();
    }
}
