<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function getDashboard(){
        return view('dashboard');
    }



    public function postCreatePost(Request $request){
        $post=new Post();
        $post->body=$request['body'];
        //$request get the autho user mode
        $request->user()->posts()->save($post);
        return redirect()->route('dash');
    }











}
