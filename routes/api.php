<?php

use App\Http\Controllers\AccountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImmeubleController;

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

Route::get('hello-world', function () {
    return json_encode('Hello World !');
});

Route::get('/user/{id}', [UserController::class, 'showOne']);
Route::get('user', [UserController::class, 'showAll']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/immeuble/read', [ImmeubleController::class, 'read']);
Route::get('/account/read', [AccountController::class, 'read']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::put('/immeuble/create', [ImmeubleController::class, 'create']);
    Route::patch('/immeuble/update/{id}', [ImmeubleController::class, 'update']);
    Route::delete('/immeuble/delete/{id}', [ImmeubleController::class, 'delete']);

    Route::put('/account/create', [AccountController::class, 'create']);
    Route::patch('/account/update/{id}', [AccountController::class, 'update']);
    Route::delete('/account/delete/{id}', [AccountController::class, 'delete']);
});
