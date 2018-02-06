<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //when the user press the signup button #because he/she didn't have account already

    public function getSignIn(Request $request){
        return view('signIn');


    }

    //This will be process in the signup route part
    public function postSignUp(Request $request){
        /**   # get the info form the route   {/postSignUp}   info{'email','first_name','password'}
         *    #encrypt the password
         *    #store all info  in the DB
        */

        //rules for validation   {this method can be done in any controller}
        $this->validate($request,[
            'email'=>'email|unique:users', //unique in the table of [users]
            'password'=>'required|min:4',
            'first_name'=>'required|max:120'
        ]);




        $email=$request['email'];
        $password=bcrypt($request['password']);
        $first_name=$request['first_name'];


        $user=new User();
        $user->email=$email;
        $user->password=$password;
        $user->first_name=$first_name;

        $user->save();
        Auth::login($user);

        return redirect()->route('signInPage');




    }
    //This will be handle in the signIn route part
    public function postSignIn(Request $request){


        //validate the email and password
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);




        //if the auth is true redirect the user to Dashboard
        if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
          return  redirect()->route('dash');

        }
        return redirect()->back();

    }

    public function getlogout(){
        Auth::logout();
        return redirect()->route('home');
    }

    /** TO DO at midnight*/


    //profile part
    public function getProfile($user_id){

        //fetch all the posts from the DB then render them in the dashboard
        $posts=User::find($user_id)->posts;

        return view('profile',['posts'=>$posts,'user'=>Auth::user()]);
    }
    public function postSaveProfile(Request $request){

        $this->validate($request,[
            'first_name'=>'required|max:120'
        ]);

        //update the user first name
        $user=Auth::user();
        $user->first_name=$request['first_name'];
        $user->update();
        //update the file only if the file exists
        $old_user_name=$user->first_name;
        $file=$request->file('image');
        $filename=$request['first_name'].'-'.$user->id.'.jpg';
        $old_file_name=$old_user_name.'-'.$user->id.'jpg';
        //check if there was a file retrived from the request  ..if that is true -> store it
        if($file){
            storage::disk('local')->put($filename,File::get($file));

        }
        return redirect()->route('profile');







    }

    //retrive the profile pic
    public function getUserImage($filename){
        $file=Storage::disk('local')->get($filename);
        return new Response($file,200);
    }




}
