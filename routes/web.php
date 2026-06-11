<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [BlogController::class, 'index']);

Route::get('/blog/{id}', [BlogController::class, 'show']);

Route::get('/category/{category}', [BlogController::class, 'category']);

Route::get('/blogs/filter', [BlogController::class, 'filter']);

/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [BlogController::class, 'loginForm'])
    ->name('login');


Route::post('/admin/login', [BlogController::class, 'login']);

Route::get('/admin/logout', [BlogController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| Protected Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [BlogController::class, 'dashboard']);

    Route::get('/admin/blogs', [BlogController::class, 'adminIndex']);

    Route::get('/admin/blogs/create', [BlogController::class, 'create']);

    Route::post('/admin/blogs/store', [BlogController::class, 'store']);

    Route::get('/admin/blogs/edit/{id}', [BlogController::class, 'edit']);

    Route::post('/admin/blogs/update/{id}', [BlogController::class, 'update']);

    Route::get('/admin/blogs/delete/{id}', [BlogController::class, 'destroy']);
});