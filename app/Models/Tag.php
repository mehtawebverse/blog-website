<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['tag_name', 'slug','usage_count'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class,'tag_blogs');
    }

   

}
