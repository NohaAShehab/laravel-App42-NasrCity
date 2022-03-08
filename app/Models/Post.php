<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    # define relations between model
    # put the logic
    # relation user and posts ---> one user --> can write many posts

    function user(){
        return $this->belongsTo(User::class);
    }
    function author(){
        return $this->belongsTo(User::class,"user_id");
    }
}
