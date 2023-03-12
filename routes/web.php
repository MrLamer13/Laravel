<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/all', [CategoryController::class, 'showAll'])
    ->name('categories.showAll');
Route::get('/categories/{id}', [CategoryController::class, 'show'])
    ->where('id', '\d+')
    ->name('categories.show');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::get('/admin', [AdminIndexController::class, 'index'])
        ->name('index');
});

