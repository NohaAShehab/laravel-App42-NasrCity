<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request; # built-in Request class
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PostController extends Controller
{

    function __construct()
    {
        $this->middleware("itimiddleware");
        $this->middleware("auth")->only("store","update","destory");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $posts = Post::orderByDesc("id")->paginate(20);# collection object
        return view("posts.index",["posts"=>$posts, "user"=>$user]);
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
    public function store(PostRequest $request)
    {


        $request["user_id"]= Auth::user()->id;
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
    public function update(PostRequest $request, Post $post)
    {
        $user= Auth::user();
//        if($post->user->id ==$user->id ){
//            $post->update($request->all());
//                return to_route("posts.show",$post);
//        }
//            return abort(403);
//            # to_route ---> route_name
//        if ($user->can("update_post",$post)){
//            dd("hi");
//        }
//        if ($user->can("isadmin")){
//            dd("I am the admin");
//        }
//
//        if(Gate::allows("update_post",$post)){
//            $post->update($request->all());
//            return to_route("posts.show",$post);
//        }
//
//        return abort(403);
        dd($this);
        $this->authorize("update",$post);
        $post->update($request->all());
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

    function testobject(){
        return Post::all();  # Collection of elequent object
    }
}
