<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Comments;
use App\Replies;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::where('status', 'visible')->orderBy('created_at', 'desc')->paginate(20);
        
        return view('/pages/blog', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $slug)
    {
        $post = Posts::where('slug', $slug->slug)->firstorfail();

        $comments = Comments::where('post_id', $slug->id)
                            ->where('status', '!=', 'Unapproved')
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        $replies = Replies::orderBy('created_at', 'desc')->get();

        $totalComments = Comments::where('post_id', $slug->id)
                                    ->where('status', '!=', 'Unapproved')
                                    ->count();
        
        return view('/pages/read', compact(['post', 'comments', 'replies', 'totalComments']));
    }

    public function moreComments(Request $request ,Posts $slug)
    {
        $commentCount = $request->commentCount;

        $comments = Comments::where('post_id', $slug->id)
                            ->where('status', '!=', 'Unapproved')
                            ->orderBy('created_at', 'desc')
                            ->paginate($commentCount);

        $totalComments = Comments::where('post_id', $slug->id)
                                    ->where('status', '!=', 'Unapproved')
                                    ->count();

        $response = array(
            'success'  => true,
            'comments' => $comments,
            'total'    => $totalComments
        );

        return response()->json($response);
    }

}
