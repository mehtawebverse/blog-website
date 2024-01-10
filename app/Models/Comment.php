<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function replies(){
        return $this->belongsToMany(Reply::class,'comment_replies');
    }
 

    protected static function boot()
{
    parent::boot();

    static::deleting(function ($comment) {
        // Delete all replies associated with the comment
        $comment->replies()->delete();
    });
}

}
