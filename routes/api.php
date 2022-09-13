<?php

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




Route::post('auth', \App\Http\Controllers\Api\AuthController::class)->name('auth');

Route::namespace('v1')->prefix('v1')->middleware(['auth:sanctum', 'ability:basic'])->group(function() {
    Route::get('products', [\App\Http\Controllers\Api\ProductsController::class, 'index']);
    Route::get('products/{product}', [\App\Http\Controllers\Api\ProductsController::class, 'show']);

    Route::get('categories', [\App\Http\Controllers\Api\CategoriesController::class, 'index']);
    Route::get('categories/{category}', [\App\Http\Controllers\Api\CategoriesController::class, 'show']);

    Route::get('users', [\App\Http\Controllers\Api\UsersController::class, 'index']);
    Route::get('users/{user}', [\App\Http\Controllers\Api\UsersController::class, 'show']);

    Route::get('orders', [\App\Http\Controllers\Api\OrdersController::class, 'index'])->middleware(["ability:order:show"]);
    Route::get('orders/{order}', [\App\Http\Controllers\Api\OrdersController::class, 'show'])->middleware(["ability:index,order:show"]);;
});



