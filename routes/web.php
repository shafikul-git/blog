<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\BlogController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\FrontEnd\HomeController;


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




// Other Route
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('about', [AboutController::class, 'about'])->name('about');
Route::get('blog', [BlogController::class, 'blog'])->name('blog');
Route::get('blog/{slug}', [BlogController::class, 'singlePost'])->name('singlePost');
Route::get('contact', [ContactController::class, 'contact'])->name('contact');



require __DIR__.'/auth.php';
