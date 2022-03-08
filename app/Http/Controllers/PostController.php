<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(5);  # collection object
        return view("posts.index",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view("posts.create",["users"=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request);
        $request->validate([
            "title"=>"required|min:5",
            "description"=>"required"
        ],[
            "title.required"=>"No post without title",
        ]);
        dump($request->all());
        ### use request to save data to the table
        ### use mass assignment while creating new object
//        Post::create([
//            "title"=>$request->all()["title"],
//            "description"=>$request->all()["description"],
//            "user_id"=>$request->all()["user_id"]
//        ]);
        Post::create($request->all());

        return to_route("posts.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view("posts.show",["post"=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        $users = User::all();
        return view("posts.edit",["post"=>$post,"users"=>$users ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title"=>"required|min:5",
            "description"=>"required"
        ],[
            "title.required"=>"No post without title",
        ]);

        $post->update($request->all());
        # to_route ---> route_name
        return to_route("posts.show",$post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
       $post->delete();
       return to_route("posts.index");
    }
}
