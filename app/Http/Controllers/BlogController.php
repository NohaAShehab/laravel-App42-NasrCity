<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BlogController extends Controller
{

    function users (){
        $data = ["Ahmed", "Ali", "Yasmin", "Yosra"];
        return view("hello",["users"=>$data]);
    }
    function test(){
        dump("testword");
    }

}
