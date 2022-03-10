<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class OldPostApiController extends Controller
{
    //
    function index(){
        return Post::all();
    }
    function show($post){
        return Post::findOrFail($post);
    }
    function store(){
        $post=Post::create(request()->all());
        return $post;
    }

    function update($post){
        $postdata= Post::findOrFail($post);
        $updatedpost=$postdata->update(request()->all());
        return Post::findOrFail($post);
    }
    function destroy($post){
        $data = Post::findOrFail($post);
        $data->delete();

        return "deleted";


    }
}
