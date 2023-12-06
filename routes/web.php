<?php

use Illuminate\Support\Facades\Route;

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
    return 'Добро пожаловать на мой первый Laravel-сайт!';
});

// Route::get('/hello', function () {
// 	$name = 'Малай Михаил';
//     $skills= ['HTML', 'CSS', 'PHP', 'JavaScript', 'C++'];
//     return view('hello', ['name' => $name, 'skills' => $skills]);
// });
Route::get('/hello', function (){
return view('hello');
});
Route::get('/app', function (){
    return view('layouts.app');
    });
    