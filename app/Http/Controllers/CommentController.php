<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Blog;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    //add your comment store function

  
public function addComment(Request $request, $id){
    $user = Auth::user();
    $blog = Blog::findOrFail($id);
    $commentObj = new Comment();
    $commentObj->comment = $request->comment;

    if($user){
    $commentObj->user()->associate($user);
    }
    else{
        $commentObj->username = $request->name;
    }

    // if($request->has('parent_id')){
    //     $commentObj->parent_id = $request->parent_id;
    // }

    $commentObj->blog()->associate($blog);
    $commentObj->save();
    return redirect()->back();
}
public function deleteComment(Request $request, $id){

    $delete_comment = Comment::findorFail($id);
    $delete_comment->delete();
    return redirect()->back();

}



    public function replyComment(Request $request, $id){

        $user = Auth::user();
        $commentObj = Comment::findorFail($id);
        $reply = new Reply();
        $reply->reply= $request->reply_content;
     
        if($user){
            $reply->username = $user->name;
            }
            else{
                $reply->username = 'Anonymous';
            }
            $reply->save();
            
            $reply->comments()->attach($commentObj);
          
          return redirect()->back();

    }




}