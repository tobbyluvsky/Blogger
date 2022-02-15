<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        Session::put('admin_page', 'tag');
        $tags = Tag::latest()->get();
        return view('admin.tag.index', compact('tags'));
    }

    public function addTag()
    {
        return view('admin.tag.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $rule = [
            'tag_name' => 'required|max:255',
        ];
        $customMessages = [
            'tag_name.required' => 'Please enter the Category Name',
            'tag_name.max' => 'you are not allowed to enter more than 255 characters',

        ];

        $this->validate($request, $rule, $customMessages);

        $slug = Str::slug($data['tag_name']);
        $tagCount = Tag::where('slug', $slug)->count();
        if ($tagCount > 0) {
            Session::flash('error_message', 'Tag name already exist in our database');
            return redirect()->back();
        }

        $tag = new Tag();
        $tag->tag_name = ucwords(strtolower($data['tag_name']));
        $tag->slug = Str::slug($data['tag_name']);

        $tag->save();
        Session::flash('success_message', 'Tag page stored successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $myTag = Tag::findorFail($id);
        return view('admin.category.edit', compact('myTag'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $rule = [
            'tag_name' => 'required|max:255',
        ];
        $customMessages = [
            'tag_name.required' => 'Please enter the Category Name',
            'tag_name.max' => 'you are not allowed to enter more than 255 characters',

        ];

        $this->validate($request, $rule, $customMessages);

        $slug = Str::slug($data['tag_name']);
        $tagCount = Tag::where('slug', $slug)->count();
        if ($tagCount > 0) {
            Session::flash('error_message', 'Tag name already exist in our database');
            return redirect()->back();
        }

        $tag = Tag::findorFail($id);
        $tag->tag_name = ucwords(strtolower($data['tag_name']));
        $tag->slug = Str::slug($data['tag_name']);

        $tag->save();
        Session::flash('success_message', 'Tag page updated successfully');
        return redirect()->back();
    }

    public function deleteTag($id)
    {
        $tag = Tag::findorFail($id);
        $tag->delete();
        Session::flash('success_message', 'Tag page deleted successfully');
        return redirect()->back();
    }


}
