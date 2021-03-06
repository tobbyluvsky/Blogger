<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


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

        $random = Str::random(10);
        if ($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = $random . '.' . $extension;
                $image_path = 'public/upload/admin/'.$filename;
                Image::make($image_tmp)->save($image_path);
                $admin->image = $filename;
            }
        }

        $image_path = 'public/upload/admin/';
         if (!empty($data['image'])){
             if (file_exists($image_path.$data['current_image'])){
                 unlink($image_path.$data['current_image']);
             }
         }

        $admin->save();
        Session::flash('success_message','Admin profile updated successfully');
        return redirect()->back();
    }


    public function changePassword(){
        $user = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.change_password',compact('user'));
    }


    // Checking Current Password
    public function checkPass(Request $request){
        $data = $request->all();
        $current_password = $data['current_password'];
        $user_id = Auth::guard('admin')->user()->id;
        $check_password = Admin::where('id', $user_id)->first();
        if(Hash::check($current_password, $check_password->password)){
            return "true"; die;
        }else{
            return "false"; die;
        }
    }

    public function updatePassword(Request $request,$id){
        $validateData = $request->validate([
           'current_password' => 'required|max:255|min:6',
           'password' => 'required|min:6',
           'confirm_password' => 'required_with:password|same:password|min:6'
        ]);

        $user = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        $current_user_password = $user->password;
        $data = $request->all();
        if(Hash::check($data['current_password'], $current_user_password)){
            $user->password = bcrypt('password');
            $user->save();
            Session::flash('success_message','Password has been updated successfully');
            return redirect()->back();
        }else{
            Session::flash('error_message','your current password does not match');
            return redirect()->back();
        }

    }




}
