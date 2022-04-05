<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostcommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'navCount'])->group(function () {
    Route::resource('profile', ProfileController::class);
    Route::resource('photo', PhotoController::class);
    Route::resource('post', PostController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('postcomment', PostcommentController::class);
    Route::resource('notifications', NotificationController::class); 
    Route::resource('bookmark', BookmarkController::class);
    Route::resource('chat', ChatController::class);
    Route::resource('message', MessageController::class);
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();


