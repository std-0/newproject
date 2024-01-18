<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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
    Route::get('/register/admin', [AdminRegistrationController::class, 'registerAdmin']);

});


Route::middleware(['admin'])->group(function () {

    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::resource('categories', CategoryController::class);
    Route::delete('/articles/{id}/delete-image', [ArticleController::class, 'deleteImage'])->name('articles.deleteImage');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users/{userId}/assign-role', [AdminUserController::class, 'assignRole'])->name('admin.users.assignRole');
    //Route::resource('users', UserController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/{id}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');
    Route::post('/users/{id}/assign-role', [UserController::class, 'processRoleAssignment'])->name('users.processRoleAssignment');

    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::resource('roles', RoleController::class);

});


