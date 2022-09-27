<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_categories = Category::where('status','0')->get();
        $latest_posts = Post::where('status','0')->orderBy('created_at','DESC')->get()->take(15);
        return view('frontend.index',compact('all_categories','latest_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function viewPost(string $category_slug, string $post_slug)
{
    $category = Category::where('slug',$category_slug)->where('status','0')->first();
    if($category){
        $post = Post::where('category_id',$category->id)->where('slug',$post_slug)->where('status','0')->first();
        $latest_posts = Post::where('category_id',$category->id)->where('status','0')->orderBy('created_at','DESC')->get()->take(15);

        return view('frontend.post.view',compact('post','latest_posts'));
    }else {
        return redirect('/userfrontend');
    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_slug)
    {
        $category = Category::where('slug',$category_slug)->where('status','0')->first();
        if ($category) {
            $post = Post::where('category_id',$category->id)->where('status','0')->paginate(7);
            return view('frontend.post.index',compact('post','category'));
        }else{
            return redirect('userfrontend');
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
