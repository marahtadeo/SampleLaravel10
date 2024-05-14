<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('user');
});

Route::get('/user', function () {
    return view('user');
});

Route::get('/user', [UsersController::class, 'index']);
Route::post('/user', [UsersController::class, 'store']);
Route::delete('/user/{id}', [UsersController::class, 'destroy']);