<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class CategoryController extends Controller
{
    public function index(){
        Session::put('admin_page', 'category');
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function addCategory(){
        $categories = Category::where('parent_id',0)->get();
        return view('admin.category.add',compact('categories'));
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
            $category->status = 0;
        }
        $category->save();
        Session::flash('success_message','Category page updated successfully');
        return redirect()->back();
    }

    public function edit($id){
        $myCat = Category::findorFail($id);
        $categories = Category::where('parent_id',0)->get();
        return view('admin.category.edit',compact('categories','myCat'));
    }



    public function update(Request $request,$id){
        $data = $request->all();
        $validateData = $request->validate([
            'category_name' => 'required|max:255|min:6',
            'order' => 'required',
        ]);

        $slug = Str::slug($data['category_name']);
        $categoryCount = Category::where('slug',$slug)->count();
        if ($categoryCount > 0){
            Session::flash('error_message','Category name already exist in our database');
            return redirect()->back();
        }

        $category = Category::findorFail($id);
        $category->category_name = ucwords(strtolower($data['category_name']));
        $category->slug = Str::slug($data['category_name']);
        $category->parent_id = $data['parent_id'];
        $category->order = $data['order'];

        if($data['status'] == 1){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->save();
        Session::flash('success_message','Category page updated successfully');
        return redirect()->back();
    }




//    public function datatable(){
//        $catTable = Category::all();
//        return Datatables::of($catTable)
//            ->addColumn('action',function ($catTable){
//                return view('admin.category._actions',[
//                   'catTable' => $catTable,
//                    'url_show' =>route('category,show',$catTable->id)
//                ]);
//            })
//            ->editColumn('parent_id',function ($catTable){
//                if ($catTable->parent_id == 0){
//                    return "Main Category";
//                }else{
//                    return $catTable->subCategory->category_name;
//                }
//            })
//            ->addIndexColumn()
//            ->rawColumns(['action'])
//            ->make(true);
//    }

//    public function show($id){
//        $catTable = Category::findorFail($id);
//        return view('admin.category.show',compact('catTable'));
//    }






}
