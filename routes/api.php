<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardProductController;
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
Route::post('/login', [AuthController::class, 'login']);

Route::get('/products', [ProductController::class, 'get']);
Route::get('/products/{slug}', [ProductController::class, 'slug']);

Route::group(['middleware' => ['apiJWT']], function() {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class, 'refresh']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::prefix('products')->group(function() {
        Route::post('/create', [DashboardProductController::class, 'create']);
        Route::delete('/{id}/delete', [DashboardProductController::class, 'destroy']);
    });
});
