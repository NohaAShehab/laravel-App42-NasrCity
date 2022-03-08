<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{


    function index(){
        # get posts form database
//        $posts = Post::all();
        $posts = Post::paginate(5);
        return view("posts.index",["posts"=>$posts]);

    }

    function create(){
        ## return a form to create new post
        $users = User::all();
        return view("posts.create",["users"=>$users]);
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
        $p->user_id =request("user_id");
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
        $users = User::all();
        return view("posts.edit",["post"=>$data,"users"=>$users ]);
    }

    function update($post){
//        @dump($post);
        $updatedpost = Post::find($post);
        $updatedpost->title =request("title");
        $updatedpost->description =request("description");
        $updatedpost->user_id= request("user_id");
        $updatedpost->save();
        return to_route("posts.index");
    }

    function destroy($post){
//        @dd($post);
        Post::find($post)->delete();
        return to_route("posts.index");
    }
}
