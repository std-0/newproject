<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [ArticleController::class, 'indexHome'])->name('home');
Route::get('/about', [ArticleController::class, 'about'])->name('about');
Route::get('/contact', [ArticleController::class, 'contact'])->name('contact');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/view-articles', [ArticleController::class, 'viewAllArticles'])->name('articles.viewAll');




Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/profile', 'ProfileController@index');
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

});

Route::middleware("guest:web")->group(function () {

    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login_process');

    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'show'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register_process');
    
});


Route::middleware(['role:admin'])->group(function () {
    
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::resource('categories', CategoryController::class);
    Route::delete('/articles/{id}/delete-image', [ArticleController::class, 'deleteImage'])->name('articles.deleteImage');

});

// Route::prefix('admin')->group(function () {

//     Route::get('/dashboard', 'AdminController@dashboard');
//     Route::get('/users', 'AdminController@users');
//     Route::get('/settings', 'AdminController@settings');

// });

