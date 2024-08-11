<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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
Route::post('menu/sub/store', [MenuController::class, 'subMenuStore'])->name('subMenuStore')->middleware('auth');

// User Route
Route::resource('users', UserController::class)->middleware('auth');

require __DIR__.'/auth.php';
