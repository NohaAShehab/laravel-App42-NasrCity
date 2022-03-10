<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  __construct()
    {
        $this->middleware("auth:sanctum")->only("store","update");
    }

    public function index()
    {
        //
        $posts= Post::all();  # collection of posts

//        return $posts;
        return PostResource::collection($posts);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $user= auth('sanctum')->user();
//        return gettype($request);
//////        dd($user);
//        return $user;
////        return "test";
////        dd($request);
////        return $request;
////        get token,
//        ## get user from token ---
        $request["user_id"] = $user->id;
        $post = Post::create($request->all());
        return new PostResource($post);

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
//        return $post;
//        return [
//            "title"=>$post->title,
//            "description" =>$post->description,
//            "user_name"=>$post->user->name
//        ];
        return new PostResource($post);
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
        //
        $user = auth("sanctum")->user();

        $request["user_id"]= $user->id;
        $post->update($request->all());

        return new PostResource($post);

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

        return response()->json([
            "status_code"=>301,
            "message"=>"post deleted"]);
    }
}
