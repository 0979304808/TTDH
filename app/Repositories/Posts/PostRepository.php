<?php

namespace App\Repositories\Posts;

use App\Core\Repositories\BaseRepository;
use App\Models\Posts\Post;
use App\Repositories\Posts\Contract\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $post)
    {
        parent::__construct($post);
        $this->model = $post;
    }

    public function whereCatAuthor($category, $author)
    {
        $post = $this->model->with(['user', 'categories'])->with(["comments" => function($q){
            $q->orderBy('created_at','desc');
        }]);
        if ($category != 'all') {
            $post = $post->hasCat($category);
        }
        if ($author != 'all') {
            $post = $post->userId($author);
        }
        return $post;
    }

    public function searchAll($search)
    {
        return $this->model->search($search);
    }

    public function ListPost($id)
    {
        return $this->model->where('id','!=',$id)->get(['id','title']);
    }

    public function whereSlugPost($slug){
        return $this->model->whereSlug($slug)->first();
    }
}
