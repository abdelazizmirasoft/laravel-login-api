<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('test',TestController::class);
Route::post("login",[UserController::class,'index']);

Route::post("/register",[AuthController::class,'register']);
Route::post("/login",[AuthController::class,'login']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('/customers',[CustomerController::class, 'index']);
    Route::post('/logout',[AuthController::class, 'logout']);
    });


