<?php

use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\InputForms\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\InputForms\OrderForDataController as AdminOrderForDataController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InputForms\FeedbackController;
use App\Http\Controllers\InputForms\OrderForDataController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/all', [CategoryController::class, 'showAll'])
    ->name('categories.showAll');
Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function (): void {
    Route::get('/', AdminIndexController::class)
        ->name('index');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('sources', AdminSourceController::class);
    Route::get('/news/{news}/sources', [AdminSourceController::class, 'index'])
        ->name('news.sources');
    Route::resource('feedback', AdminFeedbackController::class);
    Route::resource('orderfordata', AdminOrderForDataController::class);
});

Route::group(['prefix' => 'inputforms', 'as' => 'inputforms.'], static function (): void {
    Route::get('/feedback', [FeedbackController::class, 'index'])
        ->name('feedback.index');
    Route::post('/feedback', [FeedbackController::class, 'store'])
        ->name('feedback.store');
    Route::get('/orderfordata', [OrderForDataController::class, 'index'])
        ->name('orderfordata.index');
    Route::post('/orderfordata', [OrderForDataController::class, 'store'])
        ->name('orderfordata.store');
});
