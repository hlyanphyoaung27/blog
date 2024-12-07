<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/detail/{id}', [ArticleController::class, 'detail']);
Route::get('/articles/delete/{id}', [ArticleController::class, 'delete']);

Route::get('/articles/add', [ArticleController::class, 'add']);
Route::post('/articles/add', [ArticleController::class, 'create']);

Route::get('/articles/edit/{id}', [ArticleController::class, 'add']);
Route::post('/articles/edit/{id}', [ArticleController::class, 'edit']);

Route::get('/comments/delete/{id}', [CommentController::class, 'delete']);
Route::post('/comments/add', [CommentController::class, 'create']);

Route::get('/articles/like/{id}', [ArticleController::class, 'like']);

Route::get('/user/profile/{id}', [UserController::class, 'profile']);


Auth::routes();

Route::get('/home', [ArticleController::class, 'index']);
