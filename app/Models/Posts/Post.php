<?php

namespace App\Models\Posts;

use App\Models\Categories\Category;
use App\Models\Comments\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = [];

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->where('parent_id',null);
    }
    // ------ end relationship -------

    // Scope
    public function scopeSearch($query, $search)
    {
        return $query->whereId($search)->orWhere('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
    }

    public function scopeUserId($query, $author)
    {
        return $query->where('user_id', $author);
    }

    public function scopeHasCat($query, $cat)
    {
        return $query->whereHas('categories', function ($q) use ($cat) {
            $q->where('category_id', $cat);
        });
    }
    //    ----- end scope -----------
}
