<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("myapi",function (){

    return "test";
});

Route::get("/posts",[PostApiController::class,"index"]);
Route::get("/posts/{post}",[PostApiController::class,"show"]);
Route::post("/posts",[PostApiController::class,"store"]);
Route::put("/posts/{post}",[PostApiController::class,"update"]);
Route::delete("/posts/{post}",[PostApiController::class,"destroy"]);







