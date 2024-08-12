<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\post\PostController;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// menu Route
Route::resource('menu', MenuController::class)->middleware('auth');

// User Route
Route::resource('users', UserController::class)->middleware('auth');

// Post Route
Route::resource('post', PostController::class)->middleware('auth');

// Category Route
Route::resource('category', CategoryController::class)->middleware('auth');

// Tag Route
Route::resource('tag', TagController::class)->middleware('auth');


require __DIR__.'/auth.php';
