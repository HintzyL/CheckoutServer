<?php

use App\Http\Controllers\PlaceController;
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

Route::get("/users", [UserController::class, 'getUsers']);
Route::get("/user", [UserController::class, 'getUser']);
Route::post("/user", [UserController::class, 'addUser']);

Route::get("/places", [PlaceController::class, 'getPlaces']);
