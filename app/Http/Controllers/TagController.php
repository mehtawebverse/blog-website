<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Blog;

class TagController extends Controller
{
    //
    public function viewTag()
    {
        return view("tags");
    }


    public function storeTag(Request $request)
    {

        $request->validate([
            'tag_name' => 'required|unique:tags',
            'slug' => 'required|unique:tags',
        ]);

          $tagObj = Tag::firstOrCreate(
        ['tag_name' => $request->tag_name],
        ['slug' => $request->slug]
    );
        return redirect()->back();
    }

    public function allTags(){
        $allTags = Tag::all();
        return view ('allTags')->with('list', $allTags);
    }

    public function deleteTag($id){
        $tag = Tag::findorFail($id);
        $tag->delete();
        return redirect()->back();
    }
    public function popTag(){
        
        $popularTags = Tag::orderBy('usage_count', 'desc')->take(10)->get();
        return view('popTags')->with('list', $popularTags);
    }

    public function showBlogsByTag($tag)
    {
        $blogs = Blog::whereHas('tags', function ($query) use ($tag) {
            $query->where('tag_name', $tag);
        })->get();
    
        return view('blogsByTag', compact('blogs', 'tag'));
    }


}
