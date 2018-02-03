<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //The Relation between the post and the user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
