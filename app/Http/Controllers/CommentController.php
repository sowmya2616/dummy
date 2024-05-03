<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
    $comment = new Comment();
    $comment->post_id =$request->input('post_id');;
    $comment->comment_text = $request->input('comment_text');;
    $comment->save();

    return redirect()->route ('posts.index')->with('message', 'Comment created');
    }
}
