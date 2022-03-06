<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public $posts = [["id"=>1, "title"=>"post 1","desc"=>"descrption"],
            ["id"=>2, "title"=>"post 2","desc"=>"descrption 2"],
            ["id"=>3, "title"=>"post 3","desc"=>"descrption 3"],
            ["id"=>4, "title"=>"post 4","desc"=>"descrption 4"]
    ];

    function index(){
//        return "this is index page";
//        var_dump();
//        exit;
//        dd($this->posts);
        return view("posts.index",["posts"=>$this->posts]);

    }

    function create(){
        ## return a form to create new post
        return view("posts.create");
    }

    function show($post){
        dd($post);
    }
}
