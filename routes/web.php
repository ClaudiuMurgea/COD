<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\TypesController;

    #Posts Routes
// Route::resource('/',        PostsController::class);
Route::get('/', [PostsController::class, 'index']);
Route::get('/post/create', [PostsController::class, 'create']);
Route::post('/post/store', [PostsController::class, 'store']);
Route::get('/{id}/edit',    [PostsController::class, 'edit']);
Route::post('/post/{id}/update',   [PostsController::class, 'update']);
Route::delete('{id}',       [PostsController::class, 'destroy']);

    #Categories Routes
Route::any('/category/create',      [CategoryController::class, 'index']);
Route::post('/category/store',      [CategoryController::class, 'store']);
Route::get('/category/list',        [CategoryController::class, 'show'])->name('category.index');
Route::get('/category/{id}/edit',   [CategoryController::class, 'edit']);
Route::post('/category/update/{category}', [CategoryController::class, 'update']);
Route::get('/category/{id}',        [CategoryController::class, 'destroy']);

    #Cities Routes
Route::any('/city/create',      [CitiesController::class, 'index']);
Route::post('/city/store',      [CitiesController::class, 'store']);
Route::get('/city/list',        [CitiesController::class, 'show'])->name('city.index');
Route::get('/city/{id}/edit',   [CitiesController::class, 'edit']);
Route::post('/city/{id}/edit',  [CitiesController::class, 'update']);
Route::get('/city/{id}',        [CitiesController::class, 'destroy']);

    #Types Routes
Route::any('/type/create',      [TypesController::class, 'index']);
Route::post('/type/store',      [TypesController::class, 'store']);
Route::get('/type/list',        [TypesController::class, 'show'])->name('type.index');
Route::get('/type/{id}/edit',   [TypesController::class, 'edit']);
Route::post('/type/{id}/edit',  [TypesController::class, 'update']);
Route::get('/type/{id}',        [TypesController::class, 'destroy']);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//AJAX ROUTES
Route::post('/getChildrenOfParents/{parentID}',[CategoryController::class,'ajax']);

Route::post('/getChildrenOfParents/{parentID}',[PostsController::class,'ajax']);