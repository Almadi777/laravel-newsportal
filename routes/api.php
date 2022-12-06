<?php

use App\Http\Controllers\DriversController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$crud = ['store', 'show', 'index', 'destroy', 'update'];

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('drivers', DriversController::class)->only($crud);

Route::resource('vehicles', VehiclesController::class)->only($crud);
