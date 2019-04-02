<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Posts;
use App\Products;
use App\Comments;
use App\Replies;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Posts::orderBy('created_at', 'desc')->paginate(20);
       
        return view('/admin_dashboard/pages/blog/posts', compact('posts'));
    }

    public function store(Request $request, Posts $post)
    {
        $attributes = $request->validate([
            'title'   => 'required',
            'author'  => 'required',
            'content' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'status'  => 'required',
            'short_description' => 'required'
        ]);
        
        $slug = $post->generateSlug($attributes['title']);
        
        $attributes['slug'] = $slug;
            
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $name = $attributes['title'].'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }

        $attributes['featured_image'] = $name;
       
        Posts::create($attributes);

        return redirect('/admin_dashboard/blog');
    }

    public function edit(Posts $post)
    {
        $post = Posts::where('slug', $post->slug)->firstorfail();
        
        return view('/admin_dashboard/pages/blog/view', compact('post'));
    }

    public function update(Request $request, Posts $post)
    {
        $attributes = $request->validate([
            'title'   => 'required',
            'author'  => 'required',
            'content' => 'required',
            'status'  => 'required'
        ]);

        if (request()->hasFile('featured_image')) { 
            //Delete old image
            $file_path = public_path().'/images/'.$post->featured_image;
            
            if(file_exists($file_path))
            {
                unlink($file_path);
            }

            //Upload new image
            $image = request()->file('featured_image');
            $name = $attributes['title'].'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $attributes['featured_image'] = $name;

        }else{
            
            //Update image name
            $extension = $post->getExtension($post->featured_image);
            $oldImage = public_path().'/images/'.$post->featured_image;
            $newImage = public_path().'/images/'.$attributes['title'].'_'.time().'.'.$extension;

            $updatedName = rename($oldImage, $newImage);
            
            $attributes['featured_image'] = $attributes['title'].'_'.time().'.'.$extension;
        }
        
        $post->update($attributes);

        return redirect('/admin_dashboard/blog');
    }

    public function destroy(Posts $post)
    {
        $post->delete();
        
        //Delete image
        $file_path = public_path().'/images/'.$post->featured_image;
        if(file_exists($file_path))
        {
            unlink($file_path);
        }

        return redirect('/admin_dashboard/blog');
    }

    public function showComments()
    {
        $comments = Comments::select('comments.*', 'posts.title')
                        ->leftJoin('posts', 'comments.post_id', '=', 'posts.id')
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        
        return view('/admin_dashboard/pages/blog/comments', compact('comments'));
    }

    public function readComments($id)
    {
        $comment = Comments::select('comments.*', 'posts.title')
                        ->leftJoin('posts', 'comments.post_id', '=', 'posts.id')
                        ->where('comments.id', $id)
                        ->get();

        $replies = Replies::where('comment_id', $id)->orderBy('created_at', 'desc')->get();
        
        return view('/admin_dashboard/pages/blog/reply', compact(['comment', 'replies']));
    }

    public function replyComments(Request $request, $id)
    {
        $attributes = $request->validate([
            'author' => 'required',
            'body'   => 'required'
        ]);

        $attributes['comment_id'] = $id;

        Replies::create($attributes);

        return back();
    }

    public function updateComments($id)
    {
        $status = Comments::select('status')->where('id', $id)->first();
        
        if($status->status == 'approved')
        {
            Comments::where('id', $id)->update(['status' => 'unapproved']);
        } else {
            Comments::where('id', $id)->update(['status' => 'approved']);
        }

        return back();
    }

    public function destroyComments(Comments $comment)
    {
        Replies::where('comment_id', $comment->id)->delete();
        
        Comments::where('id', $comment->id)->delete();

        return redirect('/admin_dashboard/blog/comments');
    }

    public function updateReply(Replies $reply, Request $requests)
    {
        $attributes = $requests->validate([
            'author' => 'required',
            'body'   => 'required'
        ]);
        
        $reply->update($attributes);
        
        return redirect('/admin_dashboard/blog/comment/'.$reply->comment_id.'/reply');
    }

    public function editReply($id)
    {
        $reply = Replies::where('id', $id)->first();
        return view('/admin_dashboard/pages/blog/edit', compact('reply'));
    }

    public function destroyReply($id)
    {
        Replies::where('id', $id)->delete();

        return back();
    }
}
