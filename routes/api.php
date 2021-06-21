<?php

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
//Pasport register
Route::post('/register', [App\Http\Controllers\Auth\UserController::class, 'register']);
//Pasport login
Route::post('/login', [App\Http\Controllers\Auth\UserController::class, 'login']);


//Pasport Middleware//
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/details1', [App\Http\Controllers\Auth\UserController::class, 'details']);
    Route::post('/logout', [App\Http\Controllers\Auth\UserController::class, 'logout']);
});
//logout
// Route::post('/logout', [App\Http\Controllers\Auth\UserController::class, 'logout']);
