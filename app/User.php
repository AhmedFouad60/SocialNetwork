<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{

    //To use the Auth helper methods by laravel to auto validate the form
    use \Illuminate\Auth\Authenticatable;
    //The Relation between the user and the posts {the user can have many posts}
    public function posts(){
        return $this->hasMany('App\Post');
    }
    //set the relation of {user and likes}
    public function likes(){
        return $this->hasMany('\App\Like');
    }





}
