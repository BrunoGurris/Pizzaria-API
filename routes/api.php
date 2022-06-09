<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardOrderController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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


/* Rotas para usuarios deslogados */
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('products')->group(function() {
    Route::get('/', [ProductController::class, 'get']);
    Route::get('/{slug}', [ProductController::class, 'slug']);
    Route::get('/id/{id}', [ProductController::class, 'getByID']);
});

Route::prefix('orders')->group(function() {
    Route::post('/create', [OrderController::class, 'create']);
});
/* */

Route::prefix('products')->group(function() {
    Route::post('/create', [DashboardProductController::class, 'create']);
    Route::post('/{id}/edit', [DashboardProductController::class, 'edit']);
    Route::delete('/{id}/delete', [DashboardProductController::class, 'destroy']);
});


/* Rotas para usuarios logados */
Route::group(['middleware' => ['apiJWT']], function() {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);

    // Route::prefix('products')->group(function() {
    //     Route::post('/create', [DashboardProductController::class, 'create']);
    //     Route::post('/{id}/edit', [DashboardProductController::class, 'edit']);
    //     Route::delete('/{id}/delete', [DashboardProductController::class, 'destroy']);
    // });

    Route::prefix('orders')->group(function() {
        Route::get('/', [DashboardOrderController::class, 'get']);
        Route::delete('/{id}/delete', [DashboardOrderController::class, 'destroy']);
    });
});
/* */
