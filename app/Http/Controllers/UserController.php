<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

        $email=$request['email'];
        $password=bcrypt($request['password']);
        $first_name=$request['first_name'];


        $user=new User();
        $user->email=$email;
        $user->password=$password;
        $user->first_name=$first_name;

        $user->save();

        return redirect()->route('signInPage');




    }
    //This will be handle in the signIn route part
    public function postSignIn(Request $request){

    }





}
