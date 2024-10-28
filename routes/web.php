<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontEnd\AboutController;
use App\Http\Controllers\FrontEnd\BlogController;
use App\Http\Controllers\FrontEnd\CategoryController as FrontEndCategoryController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\post\CommentController;
use App\Http\Middleware\AuthMiddleWare;

Route::get('user', function () {
    return view('profile.dashboard');
})->middleware(['auth', 'verified', 'roleManager:user|admin'])->name('user');

Route::get('admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'roleManager:admin|editor|commentor'])->name('admin');

Route::get('editor', function () {
    return view('editor.dashboard');
})->middleware(['auth', 'verified', 'roleManager:editor|admin'])->name('editor');

Route::get('commentor', function () {
    return view('commentor.dashboard');
})->middleware(['auth', 'verified', 'roleManager:commentor|admin'])->name('commentor');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// menu Route
Route::resource('menu', MenuController::class)->middleware(['auth', 'verified', 'can:AdminAndEditor']);

// User Route
Route::resource('users', UserController::class)->middleware(['auth', 'verified', 'can:AdminAndEditor']);

// Post Route
Route::resource('post', PostController::class)->middleware(['auth', 'verified', 'can:administrator']);

// Category Route
Route::resource('category', CategoryController::class)->middleware(['auth', 'verified', 'can:administrator']);

// Tag Route
Route::resource('tag', TagController::class)->middleware(['auth', 'verified', 'can:administrator']);

// Post Comment Route
Route::resource('comment', CommentController::class)->middleware('auth');
Route::controller(CommentController::class)->group(function () {
    Route::post('postComment/{postId}', 'postComment')->name('postComment')->middleware('auth');
    Route::post('reaction/{action}', 'reaction')->name('reaction')->middleware('auth');
});



// About Prefix Group
Route::prefix('about')->group(function () {
    Route::get('/', [AboutController::class, 'about'])->name('about');
    // Route::get('/{id}', [AboutController::class, 'ohter'])->name('ohter');
});

// Contact Prefix Group
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('index');
    Route::post('store', [ContactController::class, 'store'])->name('store');
    Route::get('congratulations', [ContactController::class, 'congratulations'])->name('congratulations');
    Route::post('subcribe', [ContactController::class, 'subcribe'])->name('subcribe');
});

// Blog Controller Groupp
Route::controller(BlogController::class)->group(function () {
    Route::get('blog', 'blog')->name('blog');

    // Check card component then change url
    Route::get('blog/{slug}', 'singlePost')->name('singlePost');
});

// Category Controller & prefix Group
Route::prefix('categories')->name('categories.')->controller(FrontEndCategoryController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    // Check card component then change url
    Route::get('/{slug}', 'signleCateogry')->name('signleCateogry');
});


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('all-post', 'heroSection')->name('heroSection');
    Route::get('spacific-category-post/{categoryName}', 'spacificCategoryPost')->name('spacificCategoryPost');
});





require __DIR__ . '/auth.php';
