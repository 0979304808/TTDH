<?php

namespace App\Models\Categories;

use App\Models\Posts\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_category','post_id','category_id');
    }
}
