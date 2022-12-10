<?php

use Illuminate\Support\Facades\Route;

Route::get('/{path}', function () {
    return view('index');
})
    ->where('path', '^((?!api\/).)*$')
    ->name('main.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
