<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Blog extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsToMany(User::class,"user_blogs");
    }

    public function comments(){
        return $this->hasMany(Comment::class);  
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_blogs');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'tag_blogs');
    }

    

}
