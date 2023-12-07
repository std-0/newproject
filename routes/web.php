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
    return view('.index');
});

Route::get('/app', function (){
    return view('layouts.app');
    });

Route::get('/about', function (){
    return view('partials.about');
    });    

Route::get('/contact', function (){
    return view('partials.contact');
    });
    
Route::get('/services', function (){
    return view('partials.services');
    });
