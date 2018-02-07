<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    //
    public function getDashboard()
    {

        //fetch all the posts from the DB then render them in the dashboard
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('dashboard', ['posts' => $posts]);
    }


    public function postCreatePost(Request $request)
    {

        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);


        $post = new Post();
        $post->body = $request['body'];
        //$request get the autho user mode
        $message = 'There was an error';
        $key = 'alert-danger';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully Created!';
            $key = 'alert-success';


        }
        return redirect()->route('dash')->with(['message' => $message, 'key' => $key]);
    }


    public function getdeletePost($post_id)
    {
        //fetch the post with the specified id and delete it

        $post = Post::where('id', $post_id)->first();

        $message = 'can not delete the post there is an error';
        $key = 'alert-danger';
        if ($post != null) {
            if (Auth::user() != $post->user) {
                return redirect()->back();
            } //check if the user deleting post is the already own of the post or not

            $post->delete();
            $message = 'deleted successfully';
            $key = 'alert-success';
        }
        return redirect()->route('dash')->with(['message' => $message, 'key' => $key]);

    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, ['body' => 'required']);
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }


    public function postLikePost(Request $request)
    {
        //retrive the parameters from the route
        $postId = $request['postId'];
        $isLike = $request['isLike'] == 'true';
        $update = false;
        //Get the user of the post and the already post ..why {need it if i want to make new row in DB}
        $post = Post::find($postId);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $postId)->first();
        if ($like) {
            //this mean the user liked or disliked this post
            $alreadyLike = $like->like;
            $update = true;
            if ($alreadyLike == $isLike) { //this mean if i toggle the like button of already liked post it will delete the row
                $like->delete();
                return null;
            }

        } else {
            $like = new Like();
        }
        $like->like = $isLike;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
        return null;


    }








}
