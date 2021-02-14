<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\CheckController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('users', [UsersController::class,'get_all_users']);
Route::post('users/register', [UsersController::class,'register']);
Route::post('users/updatename', [UsersController::class,'updatename']);
Route::post('users/updatepassword', [UsersController::class,'updatepassword']);
Route::post('users/delete', [UsersController::class,'delete']);
Route::post('users/login', [UsersController::class,'login']);
Route::post('users/oneuser', [UsersController::class,'oneuser']);
Route::post('users/check', [CheckController::class,'store']);
Route::get('users/check', [CheckController::class,'show']);
