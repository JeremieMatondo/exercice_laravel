<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('posts',[PostController::class,'index']);

Route::get('/biens',[PropertyController::class, 'index']);
Route::put('posts/edit/{id}',[PostController::class,'update']);
Route::delete('posts/delete/{id}',[PostController::class,'delete']);
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('posts/create',[PostController::class,'store']);
    Route::get('/user',function(Request $request){
        return $request->user();
        
    });
});
