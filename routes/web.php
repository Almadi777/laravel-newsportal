<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::name('personal.')->group(function()
{
    Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth']], function () {
        Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
            Route::get('/', 'IndexController')->name('main.index');
        });
        Route::group(['namespace' => 'Liked', 'prefix' => 'likeds'], function () {
            Route::get('/', 'IndexController')->name('liked.index');
            Route::delete('/{post}', 'DeleteController')->name('liked.delete');
        });
        Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
            Route::get('/', 'IndexController')->name('comment.index');
            Route::get('/{comments}/edit', 'EditController')->name('comment.edit');
            Route::patch('/{comments}', 'UpdateController')->name('comment.update');
            Route::delete('/{comments}', 'DeleteController')->name('comment.delete');
        });
    });
});

Route::name('admin.')->group(function()
{
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
        Route::group(['namespace' => 'Main'], function () {
            Route::get('/', 'IndexController')->name('main.index');
        });

        Route::resource('posts', 'PostController');
        Route::get('/posts/change-status/{post}', [PostController::class, 'changeStatus']);

        Route::resource('categories', 'CategoryController');
        Route::get('/categories/change-status/{category}', [CategoryController::class, 'changeStatus']);

        Route::resource('tags', 'TagController');
        Route::get('/tags/change-status/{tag}', [TagController::class, 'changeStatus']);

        Route::resource('users', 'UserController');
        Route::get('/users/change-status/{user}', [UserController::class, 'changeStatus']);
    });
});

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
