<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BlogController extends Controller
{

    function users (){
        # send my name to this page
//    $myname= "Noha";
//    # view ("tempname", data needed to be sent in ass array]
//   return view("hello",["name"=>$myname]);
        $data = ["Ahmed", "Ali", "Yasmin", "Yosra"];
        return view("hello",["users"=>$data]);
    }
    function test(){
        dump("testword");
    }

}
