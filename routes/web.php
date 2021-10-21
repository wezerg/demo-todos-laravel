<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'list'])->name('postList');
Route::get('/posts/{id?}', [PostController::class, 'detail'])->name('postDetail');
Route::get('/add/post', [PostController::class, 'add']);
Route::post('/add/post', [PostController::class, 'insertPost'])->name('insertPost');
Route::delete('/remove/post/{id?}', [PostController::class, "removePost"])->name('removePost');
Route::get('/update/post/{id?}', [PostController::class, "update"]);
Route::put('/update/post/{id?}', [PostController::class, "updatePost"])->name('updatePost');
Route::put('/update/post/{id?}/picture', [PostController::class, "updatePicturePost"])->name('updatePicturePost');
Route::post('add/comment/{id?}', [CommentController::class, 'insertComment'])->name('insertComment');
Route::delete('/remove/comment/{id?}', [CommentController::class, "removeComment"])->name('removeComment');