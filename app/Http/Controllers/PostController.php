<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public $posts = [["id"=>1, "title"=>"post 1","desc"=>"descrption"],
            ["id"=>2, "title"=>"post 2","desc"=>"descrption 2"],
            ["id"=>3, "title"=>"post 3","desc"=>"descrption 3"],
            ["id"=>4, "title"=>"post 4","desc"=>"descrption 4"]
    ];

    function index(){

        return view("posts.index",["posts"=>$this->posts]);

    }

    function create(){
        ## return a form to create new post
        return view("posts.create");
    }

    function show($post){
//        dd($post);
        $data = $this->posts[$post];
        return view("posts.show",["post"=>$data]);
    }

    function edit($post){
        $data = $this->posts[$post];
        return view("posts.edit",["post"=>$data]);
    }
}
