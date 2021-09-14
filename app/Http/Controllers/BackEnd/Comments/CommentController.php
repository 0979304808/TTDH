<?php

namespace App\Http\Controllers\BackEnd\Comments;

use App\Repositories\Comments\Contract\CommentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(CommentRepositoryInterface $comment)
    {
        $this->comment = $comment;
    }

    public function create(Request $request)
    {
        $data =  $request->all();
        if ($data['type'] == 'comment'){
            return $this->comment->create([
                'user_id' => Auth::id(),
                'post_id' => $data['id'],
                'content' => $data['content']
            ]);
        }
        $id = explode('-', $data['id']);
        $id = end($id);
        return $this->comment->create([
            'user_id' => Auth::id(),
            'content' => $data['content'],
            'parent_id' => $id,
        ]);
    }

    public function update(Request $request){
        $id = $request->get('id');
        $value = $request->get('value');
        $comment = $this->comment->find($id);
        if($comment){
            $comment->update([
                'content' => $value
            ]);
        }
    }

}
