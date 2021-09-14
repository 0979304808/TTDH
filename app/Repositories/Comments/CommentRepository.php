<?php

namespace App\Repositories\Comments;

use App\Core\Repositories\BaseRepository;
use App\Models\Comments\Comment;
use App\Repositories\Comments\Contract\CommentRepositoryInterface;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    protected $model;

    public function __construct(Comment $comment)
    {
        parent::__construct($comment);
        $this->model = $comment;
    }
}
