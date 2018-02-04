<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function getDashboard(){

        //fetch all the posts from the DB then render them in the dashboard
        $posts=Post::all();

        return view('dashboard',['posts'=>$posts]);
    }



    public function postCreatePost(Request $request){

        $this->validate($request,[
            'body'=>'required|max:1000'
        ]);


        $post=new Post();
        $post->body=$request['body'];
        //$request get the autho user mode
        $message='There was an error';
        $key='alert-danger';
        if ($request->user()->posts()->save($post)){
            $message='Post successfully Created!';
            $key='alert-success';


        }
        return redirect()->route('dash')->with(['message'=>$message,'key'=>$key]);
    }











}
