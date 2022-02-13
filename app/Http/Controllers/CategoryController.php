<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index(){
        Session::put('admin_page', 'category');
        return view('admin.category.index');
    }

    public function addCategory(){
        return view('admin.category.add');
    }

    public function store(Request $request){
        $data = $request->all();
        $rule = [
            'category_name' => 'required|max:255',
            'order' => 'required',
        ];
        $customMessages = [
            'category_name.required' => 'Please enter the Category Name',
            'category_name.max' => 'you are not allowed to enter more than 255 characters',
            'order.required' => 'Please define priority order',

        ];

        $this->validate($request,$rule,$customMessages);

        $slug = Str::slug($data['category_name']);
        $categoryCount = Category::where('slug',$slug)->count();
        if ($categoryCount > 0){
            Session::flash('error_message','Category name already exist in our database');
            return redirect()->back();
        }

        $category = new Category();
        $category->category_name = ucwords(strtolower($data['category_name']));
        $category->slug = Str::slug($data['category_name']);
        $category->parent_id = $data['parent_id'];
        $category->order = $data['order'];

        if($data['status'] == 1){
            $category->status = 1;
        }else{
            $category->status = 1;
        }
        $category->save();
        Session::flash('success_message','Category page updated successfully');
        return redirect()->back();
    }
}
