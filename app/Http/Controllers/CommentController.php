<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function insertComment(CommentStoreRequest $request, $id){
        $params = $request->validated();
        
        $params['postId'] = $id;
        Comment::create($params);
        $post = Post::find($id);
        return back();
    }

    public function removeComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        return back();
    }
}
