<?php

use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::resource('user', UserController::class);
//Pasport register
Route::post('/register', [UserController::class, 'register']);
//Pasport login
Route::post('/login', [UserController::class, 'login']);
//Pasport Middleware//
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/details1', [UserController::class, 'details']);
    Route::post('/logout', [UserController::class, 'logout']);
});