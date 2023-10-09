<?php

use App\Http\Controllers\Admin\EditorController as AdminEditorController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\InputForms\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\InputForms\DataOrderController as AdminDataOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ParserController as AdminParserController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InputForms\FeedbackController;
use App\Http\Controllers\InputForms\DataOrderController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::group(['prefix' => 'news', 'as' => 'news.'], static function (): void {
    Route::get('/', [NewsController::class, 'index'])
        ->name('index');
    Route::get('/{news:slug}', [NewsController::class, 'show'])
        ->name('show');
});

Route::group(['prefix' => 'categories', 'as' => 'categories.'], static function (): void {
    Route::get('/', [CategoryController::class, 'index'])
        ->name('index');
    Route::get('/all', [CategoryController::class, 'showAll'])
        ->name('showAll');
    Route::get('/{category:slug}', [CategoryController::class, 'show'])
        ->name('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], static function (): void {
        Route::get('/', AdminIndexController::class)
            ->name('index');
        Route::resource('news', AdminNewsController::class);
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::get('/news/{news:slug}/sources', [AdminSourceController::class, 'index'])
            ->name('news.sources');
        Route::resource('feedback', AdminFeedbackController::class);
        Route::resource('dataorders', AdminDataOrderController::class);
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
    Route::get('/dataorders', [DataOrderController::class, 'index'])
        ->name('dataorders.index');
    Route::post('/dataorders', [DataOrderController::class, 'store'])
        ->name('dataorders.store');
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
