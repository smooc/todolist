<?php

use App\Http\Controllers\Admin\usersController;
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



Route::middleware(['auth:sanctum', 'admin'])->group(function(){
    Route::get('/dashboard', [usersController::class, 'index'])->name('dashboard');
});

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});