<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', PostsController::class);
Route::any('/{id}/edit', [PostsController::class, 'edit']);
Route::delete('{id}', [PostsController::class, 'destroy']);

Route::any('/category/create', [CategoryController::class, 'index']);

Route::post('/category/store', [CategoryController::class, 'store']);
Route::post('/category/update/{category}', [CategoryController::class, 'update']);
Route::get('/category/list', [CategoryController::class, 'show'])->name('category.index');

Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::get('/category/{id}', [CategoryController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
