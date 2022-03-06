<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
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
Route::get("/students", function(){
    $students = ["Ahmed","Ali","Mohamed"];
    return $students;
});
################# Routes , return view ---> no need to extra info from backend
//Route::get("/aboutus",function (){
//    return view ("aboutus");
//});
Route::view("/aboutus", "aboutus");
