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
Route::get('/', function () {
    $articles = Article::take(6)->get();
    return view('index', ['articles' => $articles]);
});

Route::get('/app', function () {
    $articles = Article::all();
    return view('partials.article_list', ['articles' => $articles]);

});



Route::get('/about', function () {
    return view('partials.about');
});

Route::get('/contact', function () {
    return view('partials.contact');
});

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::get('/view-articles', [ArticleController::class, 'viewAllArticles'])->name('articles.viewAll');
Route::resource('categories', CategoryController::class);

// Route::middleware(['auth'])->group(function () {
//     // Здесь находятся маршруты, которые используют middleware 'auth'
//     Route::get('/dashboard', 'DashboardController@index');
//     Route::get('/profile', 'ProfileController@index');
// });

// Route::prefix('admin')->group(function () {
//     // Все маршруты внутри этой группы будут иметь префикс 'admin'
//     Route::get('/dashboard', 'AdminController@dashboard');
//     Route::get('/users', 'AdminController@users');
//     Route::get('/settings', 'AdminController@settings');
// });

Route::delete('/articles/{id}/delete-image', [ArticleController::class, 'deleteImage'])->name('articles.deleteImage');
