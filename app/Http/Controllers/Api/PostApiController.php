<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostApiController extends Controller
{
    //
    function index(){
//        $posts =Post::all();
        return Post::all();
    }
    function show($post){
//        dd(Post::find($post));
        return Post::findOrFail($post);
    }
    function store(){

//        dd("I am in the store function",request()->all());
        $post=Post::create(request()->all());
        return $post;
    }
    function update($post){
//            dd($post,request()->all());
        $postdata= Post::findOrFail($post);
        $updatedpost=$postdata->update(request()->all());
        return Post::findOrFail($post);

    }
    function destroy($post){
//        return "hii";
        $data = Post::findOrFail($post);
        $data->delete();

        return "deleted";


    }
}
