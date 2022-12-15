<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    protected $table='user';  
    protected $fillable=['id','name','email','address','password','period'];  
   
}

