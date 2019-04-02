<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Posts;

class CommentsController extends Controller
{
    public function store(Request $requests)
    {
        $attributes = $requests->validate([
            'name' => 'required',
            'body' => 'required',
            'post_id'   => 'required'
        ]);

        $comment = new Comments();
        $comment->post_id = $requests->post_id;
        $comment->name = $requests->name;
        $comment->body = $requests->body;
        $comment->status = 'unapproved';
        
        $comment->save();

        $comment->datePosted = date("F d, Y");

        $response = array(
            'success' => true,
            'comment' => $comment,
        );

        return response()->json($response);
    }
}
