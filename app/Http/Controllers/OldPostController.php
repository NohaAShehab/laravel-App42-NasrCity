<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class OldPostController extends Controller
{


    function index(){
        $posts = Post::paginate(5);  # collection object
        return view("posts.index",["posts"=>$posts]);

    }

    function create(){
        $users = User::all();
        return view("posts.create",["users"=>$users]);
    }

    function store(){

        request()->validate([
            "title"=>"required|min:5",
            "description"=>"required"
        ],[
            "title.required"=>"No post without title",
        ]);

        $request_data = request()->all();  # array of the request data
        $p = new Post();
        $p->title =$request_data["title"];
        $p->description =$request_data["description"];
        $p->user_id =request("user_id");
        $p->save();
        return to_route("posts.index");
    }

    function show($post){
//        $data = Post::find($post);
////        dump($data->user());
////        dump($data->user);
//        if($data){
//            return view("posts.show",["post"=>$data]);
//        }
//        return abort(404);
//
        $data = Post::findOrFail($post);
        return view("posts.show",["post"=>$data]);
    }

    function edit($post){
        $data = Post::findOrFail($post);
        $users = User::all();
        return view("posts.edit",["post"=>$data,"users"=>$users ]);
    }

    function update($post){
        $updatedpost =  Post::findOrFail($post);
        $updatedpost->title =request("title");
        $updatedpost->description =request("description");
        $updatedpost->user_id= request("user_id");
        $updatedpost->save();
        return to_route("posts.index");
    }

    function destroy($post){
        Post::findOrFail($post)->delete();
        return to_route("posts.index");
    }
}
