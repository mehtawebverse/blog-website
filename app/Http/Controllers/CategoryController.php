<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Blog;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function viewCats()
    {
        return view('cats');
    }

    public function addCategory(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|unique:categories',
            'slug' => 'required|unique:categories',
        ]);

          $catObj = Category::firstOrCreate(
        ['cat_name' => $request->cat_name],
        ['slug' => $request->slug]
    );
        return redirect()->back();
    }


    public function allCategories(){
        $allCats = Category::all();
        return view('allCats')->with('list', $allCats);
    }

    public function deleteCategory($id){
     $cats = Category::findorFail($id);
     $cats->delete();
     return redirect()->back();
    }

    public function showBlogsByCategory($cat){
        $blogs = Blog::whereHas('categories',function($query) use ($cat){
            $query->where('cat_name', $cat);
        })->paginate(6);
        return view('blogsByCat',compact('blogs','cat'));
    }
   
}
