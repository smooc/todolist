<?php

use App\Http\Controllers\Api\Auth\loginController;
use App\Http\Controllers\Api\todoItemController;
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

Route::post('/login', [loginController::class, 'login']);
Route::get('/todolist', [todoItemController::class, 'todoList']);
Route::post('/todoitem', [todoItemController::class, 'store']);
Route::post('/todoitem/{list_id}',[todoItemController::class, 'update']);
Route::delete('/todoitem/{list_id}',[todoItemController::class, 'destroy']);
