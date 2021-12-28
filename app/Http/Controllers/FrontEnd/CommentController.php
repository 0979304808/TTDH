<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Comments\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request){

        $data = $request->all();
        $status = 0;
        // Lưu vào databse khi spam và status = 2;
        if (check_spam($data['content'])) {
            $status = 2;
        }
            $comment = Comment::create([
                'user_id' => Auth::id(),
                'post_id' => $data['post_id'],
                'content' => $data['content'],
                'status' => $status
            ]);
        // không lưu vào database khi spam
//        if (!check_spam($data['content'])) {
//            $comment = Comment::create([
//                'user_id' => Auth::id(),
//                'post_id' => $data['post_id'],
//                'content' => $data['content'],
//                'status' => $status
//            ]);
//        }
        return response()->json('Thành công', 200);
    }


}
