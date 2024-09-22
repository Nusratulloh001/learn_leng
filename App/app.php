<?php

use App\Classes\Route;
use App\Controllers\Auth\Registration;
use App\Controllers\ErrorController;
use App\Controllers\PagesController;
use App\Controllers\PostsController;


Route::get('/', PagesController::class, 'index');
Route::get('/about', PagesController::class, 'about');

Route::get('/registration', Registration::class, 'registration');
Route::post('/store', Registration::class, 'store');

Route::resources('/posts', PostsController::class);

Route::fallback(ErrorController::class, 'notFound');