<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeScreenController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\MailController;

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

//View Routes
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

//Functional Routes
Route::get('/', [HomeScreenController::class, 'displayhomescreen']);
Route::get('/profile', [UserController::class, 'user_profile']);
Route::get('/logout', [LoginController::class, 'user_logout']);
Route::post('/userregister', [LoginController::class, 'user_register']);
Route::post('/userlogin', [LoginController::class, 'user_login']);
Route::post('/createforum', [ForumController::class, 'createforum']);
Route::post('/subsribe', [MailController::class, 'user_subscribe']);
