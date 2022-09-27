<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->category_id = $request->input('category_id');
        $post->name= $request->input('name');
        $post->slug=Str::slug($request->input('slug'));
        $post->description=$request->input('description');
        $post->yt_iframe=$request->input('yt_iframe');
        $post->meta_title=$request->input('meta_title');
        $post->meta_description=$request->input('meta_description');
        $post->status=$request->input('status')== TRUE ? '1':'0';
        $post->created_by=Auth::user()->id;
        $post->save();
        return redirect('admin/post')->with('message',"Post Added Successfully");
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
        $post= Post::find($id);
        $categories = Category::where('status','0')->get();
        return view('admin.post.edit',compact('post','categories'));
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
        $post = Post::find($id);
        $post->category_id = $request->input('category_id');
        $post->name= $request->input('name');
        $post->slug=Str::slug($request->input('slug'));
        $post->description=$request->input('description');
        $post->yt_iframe=$request->input('yt_iframe');
        $post->meta_title=$request->input('meta_title');
        $post->meta_description=$request->input('meta_description');
        $post->status=$request->input('status')== TRUE ? '1':'0';
        $post->created_by=Auth::user()->id;
        $post->update();
        return redirect('admin/post')->with('message',"Post updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('messagae',"Post Delted Successfully");
    }
}
