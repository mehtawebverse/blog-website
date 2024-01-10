<?php

namespace App\Http\Controllers;

use App\Mail\BlogDeletedMail;
use Illuminate\Support\Facades\Mail;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;


class BlogController extends Controller
{


    public function addBlog(Request $request)
    {
        $blogObj = new Blog();

        $blogObj->title = $request->title;
        $blogObj->description = $request->description;
        $blogObj->status = $request->status;
        $blogObj->state = 'pending';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $blogObj->image = $imageName;
        }


        if ($blogObj->save()) {
            if ($request->categories != 'null') {
                $cats = $request->input('categories', []);
                // dd( $cats);
                $blogObj->categories()->attach($cats);
            }

            if ($request->tags != 'null') {
                $tags = $request->input('tags', []);
                // dd( $tags);
                // $tags->increment('usage_count');
                $blogObj->tags()->attach($tags);
                foreach ($blogObj->tags as $tag) {
                    $tag->increment('usage_count');
                }
            }

        }


        Auth::user()->blogs()->attach($blogObj->id);
        // return redirect()->back();
        return response()->json(['success' => 'blog saved successfully']);



    }


    public function viewBlog()
    {

        $user = Auth::user();
        $everyBlog = $user->blogs;
        return view('allBlogs')->with('list', $everyBlog);
    }



    public function deleteBlog($id)
    {

        $delete_blog = Blog::findorFail($id);
        // dd($delete_blog);
        // $delete_blog->delete();
        Mail::to(auth()->user()->email)->send(new BlogDeletedMail());
        Mail::to('thakursparsh.st@gmail.com')->send(new BlogDeletedMail());

        // return response()->json(['success'=>'blog deleted successfully']);
        // return redirect()->back();
        return response()->json(['success' => 'blog deleted successfully']);



    }


    public function blogToBeEdited($id)
    {
        $updateMode = true;
        $show_blog = Blog::findorFail($id);
        $cats = Category::all();
        $tags = Tag::all();
        return view('user', compact('updateMode', 'show_blog', 'cats', 'tags'));

    }

    public function editBlog(Request $request, $id)
    {
        $updateBlog = Blog::findorFail($id);

        if (!empty($updateBlog->image)) {
            $oldImagePath = public_path('uploads') . '/' . $updateBlog->image;

            // Check if the file exists before attempting to delete it
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Delete the old image file
            }
        }

        $updateBlog->title = $request->title;
        $updateBlog->description = $request->description;
        $updateBlog->status = $request->status;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid() . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $updateBlog->image = $imageName;
        }
        // $updateBlog->save();

        if ($updateBlog->save()) {
            if ($request->categories != 'null') {
                $cats = $request->input('categories', []);
                // dd( $cats);
                $updateBlog->categories()->attach($cats);
            }

            if ($request->tags != 'null') {
                $tags = $request->input('tags', []);
                // dd( $tags);
                // $tags->increment('usage_count');
                $updateBlog->tags()->attach($tags);
                foreach ($updateBlog->tags as $tag) {
                    $tag->increment('usage_count');
                }
            }

        }

        // return redirect()->back();
        return response()->json(['success' => 'blog updated successfully']);

    }





    /////////////////////////////////////////////////////////////////////////////
    ////////////////////////      CODE    FOR     FEED    ///////////////////////
    //////////////////////////////        PAGE         /////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    // public function latestBlogs()
    // {
    //     $latestBlog = Blog::where('state','published')->latest()->take(4)->get();
    //     // $blog = Blog::all();
    // //    $blog = Blog::paginate(6);
    // $blog = Blog::where('state','published')->paginate(6);
    //     $popularTags = Tag::orderBy('usage_count', 'desc')->take(5)->get();
    //     $popularCats = Category::orderBy('usage_count','desc')->take(5)->get();


    //     return view('feeds')->with(['lastBlogs' => $latestBlog, 
    //     'list' => $blog, 
    //     'poptag' => $popularTags,
    //     'popcat' => $popularCats,
    // ]);
    // }

    public function latestBlogs(Request $request)
    {
        $lastBlogs = Blog::where('state', 'published')->latest()->take(4)->get();
        // $blog = Blog::all();
        //    $blog = Blog::paginate(6);
        // $blog = Blog::where('state','published')->paginate(6);
        $allBlogs = Blog::paginate(8);
        $poptag = Tag::orderBy('usage_count', 'desc')->take(5)->get();
        $popcat = Category::orderBy('usage_count', 'desc')->take(5)->get();

        if ($request->ajax()) {
            $view = view('data', compact('allBlogs'))->render();
            return response()->json(['html' => $view]);

        }

        return view('feeds', compact('allBlogs', 'lastBlogs', 'poptag', 'popcat'));

    }





    public function clickBlog($id)
    {
        $blog = Blog::findorFail($id);
        $popularTags = Tag::orderBy('usage_count', 'desc')->take(4)->get();
        $popularCats = Category::orderBy('usage_count', 'desc')->take(4)->get();

        return view('clickblog')->with([
            'clicked' => $blog,
            'list' => $popularTags,
            'popcat' => $popularCats,
        ]);
    }

    public function trendingHome()
    {
        $tHome = Blog::where('state', 'published')->latest()->take(4)->get();
        return view('home')->with('trending', $tHome);
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Blog::where(function ($queryBuilder) use ($query) {

            $queryBuilder->where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%');

        })->where('state', 'published')->get();

        return view('search', ['posts' => $posts, 'query' => $query]);

    }


    public function adminCustmUser()
    {

        $user = User::all();
        return view('admin.alluser')->with('users', $user);
    }

    public function deleteUser($id)
    {
        $user = User::findorFail($id);
        $user->comments()->delete();
        $user->blogs()->each(function ($blog) {
            $blog->comments()->delete();
        });
        $user->blogs()->delete();
        $user->delete();
        return redirect()->back();
    }





    /////////////////////////////////////////////////////////////////////////////
    ////////////////////////      CODE    FOR     PENDING    ///////////////////////
    //////////////////////////////      POSTS  PAGE          /////////////////////////
    ////////////////////////////////////////////////////////////////////////////




    public function blogState()
    {

        $pendingBlogs = Blog::where('state', 'pending')->get();
        return view('admin.post-state')->with('list', $pendingBlogs);

    }

    public function approveBlog($id)
    {
        $blog = Blog::findorFail($id);

        if (auth()->user()->id == 1) {
            $blog->state = 'published';
            $blog->save();
        }

        return redirect()->back();

    }


    public function stones(Request $request)
    {
        // $blog = Blog::all();
        $allBlogs = Blog::paginate(8);

        if ($request->ajax()) {
            $view = view('data', compact('allBlogs'))->render();
            return response()->json(['html' => $view]);

        }
        return view('posts', compact('allBlogs'));
    }






}


