<?php

use App\Http\Controllers\Admin\EditorController as AdminEditorController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\InputForms\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\InputForms\OrderfordataController as AdminOrderfordataController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InputForms\FeedbackController;
use App\Http\Controllers\InputForms\OrderfordataController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news:slug}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');
Route::get('/categories/all', [CategoryController::class, 'showAll'])
    ->name('categories.showAll');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::middleware('auth')->group(function () {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], static function (): void {
        Route::get('/', AdminIndexController::class)
            ->name('index');
        Route::resource('news', AdminNewsController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::get('/news/{news}/sources', [AdminSourceController::class, 'index'])
            ->name('news.sources');
        Route::resource('feedback', AdminFeedbackController::class);
        Route::resource('orderfordata', AdminOrderfordataController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('resources', AdminResourceController::class);

        Route::get('/profile', [AdminProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::put('/profile', [AdminProfileController::class, 'update'])
            ->name('profile.update');

        Route::get('parser', AdminParserController::class)
            ->name('parser');

        Route::post('ckeditor/upload', [AdminEditorController::class, 'upload'])
            ->name('upload');
    });
});

Route::group(['prefix' => 'inputforms', 'as' => 'inputforms.'], static function (): void {
    Route::get('/feedback', [FeedbackController::class, 'index'])
        ->name('feedback.index');
    Route::post('/feedback', [FeedbackController::class, 'store'])
        ->name('feedback.store');
    Route::get('/orderfordata', [OrderfordataController::class, 'index'])
        ->name('orderfordata.index');
    Route::post('/orderfordata', [OrderfordataController::class, 'store'])
        ->name('orderfordata.store');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/redirect/{driver}', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.auth.redirect');

    Route::get('/auth/callback/{driver}', [SocialProvidersController::class, 'callback'])
        ->where('driver', '\w+');
});
