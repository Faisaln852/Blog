<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $category = new Category();
        $category->name= $request->input('name');
        $category->slug= Str::slug($request->input('slug'));
        $category->description= $request->input('description');
        $category->meta_title= $request->input('meta_title');
        $category->meta_description= $request->input('meta_description');
        $category->meta_keywords= $request->input('meta_keywords');
        $category->navbar_status= $request->input('navbar_status') == TRUE ? '1':'0';
        $category->status= $request->input('status')== TRUE ?'1':'0';
        $category->created_by= Auth::user()->id;
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename =time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/uploads/category/', $filename);
            $category->image= $filename;
        }
        $category->save();
        return redirect('admin/category')->with('message',"Category Added Successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name= $request->input('name');
        $category->slug= Str::slug($request->input('slug'));
        $category->description= $request->input('description');
        $category->meta_title= $request->input('meta_title');
        $category->meta_description= $request->input('meta_description');
        $category->meta_keywords= $request->input('meta_keywords');
        $category->navbar_status= $request->input('navbar_status') == TRUE ? '1':'0';
        $category->status= $request->input('status')== TRUE ?'1':'0';
        $category->created_by = Auth::user()->id;
        if ($request->hasFile('image')) {
           if ($category->image) {
            $path = ('assets/uplods/category/'.$category->image);
            if (File::exists($path)) {
                File::delete($path);
            }
           }
            $file = $request->file('image');
            $filename =time().'.'.$file->getClientOriginalExtension();
            $file->move('assets/uploads/category/', $filename);
            $category->image= $filename;
        }
        $category->update();
        return redirect('admin/category')->with('message',"Category Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path= ('assets/uploads/category/'.$category->image);
            if (File::exists($path)) {
                File::delete($path);
            }
        } 
        if (Post::where('category_id',$category->id)->exists()) {
            $posts= Post::where('category_id',$category->id)->get();
           foreach($posts as $post){
            $post->delete();
          }
        }
        
        $category->delete();
        return redirect()->back()->with('message','Category Deleted with its Posts Successfully');
    }
}
