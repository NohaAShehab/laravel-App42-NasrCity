<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


    function index(){
        # get posts form database
        $posts = Post::all();
        return view("posts.index",["posts"=>$posts]);

    }

    function create(){
        ## return a form to create new post
        return view("posts.create");
    }

    function store(){
        # send data to backend,
//        @dd($_POST);
//        $request_data = request();
        $request_data = request()->all();
//        dd($request_data);

        #### object from posts
        $p = new Post();
        $p->title =$request_data["title"];
        $p->description =$request_data["description"];
        $p->user_id =1;
        $p->save();

//        return redirect(route("posts.index"));
        # form laravel 9
        return to_route("posts.index");
    }

    function show($post){
//        dd($post);
        $data = Post::find($post);
        return view("posts.show",["post"=>$data]);
    }

    function edit($post){
        $data = Post::find($post);
        return view("posts.edit",["post"=>$data]);
    }

    function update($post){
//        @dump($post);
        $updatedpost = Post::find($post);
        $updatedpost->title =request("title");
        $updatedpost->description =request("description");
        $updatedpost->save();
        return to_route("posts.index");
    }

    function destroy($post){
//        @dd($post);
        Post::find($post)->delete();
        return to_route("posts.index");
    }
}
