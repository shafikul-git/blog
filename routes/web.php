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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'can:administrator'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// menu Route
Route::resource('menu', MenuController::class)->middleware('can:AdminOrEditor');

// User Route
Route::resource('users', UserController::class)->middleware('auth');

// Post Route
Route::resource('post', PostController::class)->middleware('auth');

// Category Route
Route::resource('category', CategoryController::class)->middleware('auth');

// Tag Route
Route::resource('tag', TagController::class)->middleware('auth');

// Post Comment Route
Route::resource('comment', CommentController::class)->middleware('auth');
Route::post('postComment/{postId}', [CommentController::class, 'postComment'])->name('postComment')->middleware(AuthMiddleWare::class);
Route::post('reaction/{action}', [CommentController::class, 'reaction'])->name('reaction')->middleware(AuthMiddleWare::class);





// Other Route
Route::get('/', [HomeController::class, 'home'])->name('home');

// About Prefix Group
Route::prefix('about')->group(function (){
    Route::get('/', [AboutController::class, 'about'])->name('about');
    // Route::get('/{id}', [AboutController::class, 'ohter'])->name('ohter');
});

// Contact Prefix Group
Route::prefix('contact')->name('contact.')->group(function (){
    Route::get('/', [ContactController::class, 'index'])->name('index');
});

// Blog Controller Groupp
Route::controller(BlogController::class)->group(function(){
    Route::get('blog', 'blog')->name('blog');
    Route::get('blog/{slug}', 'singlePost')->name('singlePost');
});

// Category Controller & prefix Group
Route::prefix('categories')->name('categories.')->controller(FrontEndCategoryController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}', 'signleCateogry')->name('signleCateogry');
});





require __DIR__.'/auth.php';
