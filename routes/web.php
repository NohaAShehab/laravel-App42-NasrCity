<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;

/*
|--------------------------------------------------------------------------
| Web Routes  ---> handle requests from http
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
### route ---> when a get request received ---> you will return with the view
# with name welcome
Route::get('/', function () {
    return view('welcome');
});
//

### construact url ---> /iti --> redirect to the welcome homepage
Route::get("/iti",function (){
    return view("iti");
});

Route::get("/html",function (){
   return view("struct");
});
#########################################
Route::get("/test",function (){
    return "I am Noha";
});
###########################################
# get respresent request method
Route::get("/students", function(){
    $students = ["Ahmed","Ali","Mohamed"];
    return $students;
});
################# Routes , return view ---> no need to extra info from backend
//Route::get("/aboutus",function (){
//    return view ("aboutus");
//});
Route::view("/aboutus", "aboutus");
##################### create page ---> when call it---> print my name

Route::get("/hello",[BlogController::class,"users"]);

############# project oriented ###########
###### CRUD ---> POSTS --->
# define route names --> centralize the route
# list all posts
Route::get("/posts",[PostController::class,"index"])->name("posts.index");

# create new post
Route::get("/posts/create",[PostController::class,"create"])->name("posts.create");

Route::post("/posts",[PostController::class,"store"])->name("posts.store");

# view post

Route::get("/posts/{post}",[PostController::class,"show"])->name("posts.show");

# edit post
Route::get("/posts/{post}/edit",[PostController::class,"edit"])->name("posts.edit");


### update
Route::put("/post/{post}",[PostController::class,"update"])->name("posts.update");
#delete

Route::delete("/post/{post}",[PostController::class,"destroy"])->name("posts.destroy");
###############################################################
# get all posts related to user

Route::get("/userposts/{user}", [UserController::class, "userposts"])->name("user.posts");

Route::get("/authorposts/{user}",[AuthorController::class,"allposts"])->name("author.posts");

Route::get("/testroute",function (){
   return "I am test route";
});







