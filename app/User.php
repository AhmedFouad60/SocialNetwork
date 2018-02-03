<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{

    //To use the Auth helper methods by laravel to auto validate the form
    use \Illuminate\Auth\Authenticatable;
    //
}
