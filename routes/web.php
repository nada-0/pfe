<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetupController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('profiles.profile');
    Route::get('/profile/editProfile', [UserController::class, 'edit'])->name('profiles.editProfile');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profiles.update');
    Route::post('/profile/toggle-notifications', [UserController::class, 'toggleNotifications'])->name('toggle.notifications');
    Route::delete('/profile/delete', [UserController::class, 'destroy'])->name('profiles.destroy');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.service');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.post');
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.addPost');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.editPost');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');

Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('posts.comments');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::middleware('auth')->group(function () {
    Route::resource('meetups', MeetupController::class);
    Route::get('meetups/events', [MeetupController::class, 'events'])->name('meetups.events');
});