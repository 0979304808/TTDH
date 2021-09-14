<?php

namespace App\Models\Comments;

use App\Models\Posts\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $guarded = [];

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }

    public function childComments()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }
    // ----------- end relationship ------------
}
