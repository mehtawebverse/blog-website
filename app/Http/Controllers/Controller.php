<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function addBlogView()
    {
        $cats = Category::all();
        $tags = Tag::all();
        return view("user",compact("cats","tags"));
    }

    public function adminDashView()
    {
        return view("adminDash");
    }

    public function userDashView()
    {
        return view("userDash");
    }

    public function feedView()
    {   
        $blog = Blog::all();
        return view("feeds")->with("list", $blog);
    }

    public function adminCustmBlog(){
        $everyBlog = Blog::all();
        return view('allBlogs')->with('list', $everyBlog);
    }



// practice methods

public function practice(){
    $allusers = DB::table('users')->get();
    
    foreach($allusers as $list)
    {
        echo $list->name;
    }
}

public function pratwo(){
    $blogs = DB::table('blogs')->count();
    echo $blogs;
}



}
