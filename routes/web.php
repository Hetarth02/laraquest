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
Route::get('/about', function () {
    return view('about');
});

//Functional Routes
Route::get('/', [HomeScreenController::class, 'displayhomescreen']);
Route::get('/profile', [UserController::class, 'profile']);
Route::get('/profile/{username}', [UserController::class, 'user_profile']);
Route::get('/logout', [LoginController::class, 'user_logout']);
Route::get('/forum/{id}', [HomeScreenController::class, 'threadview']);
Route::get('/forum/{id}/filter/{tag}', [HomeScreenController::class, 'filter']);
Route::get('/{forum_id}/{thread_id}', [HomeScreenController::class, 'qaview']);
Route::get('/{forum_id}/{thread_id}/sort', [HomeScreenController::class, 'sort']);
Route::get('{forum_name}/bookmark/{thread_id}', [UserController::class, 'bookmark']);
Route::get('{forum_name}/remove_bookmark/{thread_id}', [UserController::class, 'remove_bookmark']);
Route::get('/{forum_name}/resolved/{thread_id}', [UserController::class, 'resolved']);
Route::get('/{forum_name}/unresolved/{thread_id}', [UserController::class, 'unresolved']);
Route::post('/userregister', [LoginController::class, 'user_register']);
Route::post('/userlogin', [LoginController::class, 'user_login']);
Route::post('/createforum', [ForumController::class, 'createforum']);
Route::post('/{id}/createthread', [ForumController::class, 'createthread']);
Route::post('/{forum_id}/{id}/createreply', [ForumController::class, 'createreply']);
Route::post('/forgotpassword', [MailController::class, 'forgotpassword']);
