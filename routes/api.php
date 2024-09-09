<?php

use App\Http\Controllers\AuthUserAPIController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CoordinateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthUserAPIController::class, 'login']);
Route::post('/register', [UserController::class, 'store']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout', [AuthUserAPIController::class, 'logout']);
    Route::get('/profile', [AuthUserAPIController::class, 'profile']);

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['prefix' => 'users', 'controller' => UserController::class], function () {

        Route::get('/', 'index');
        Route::get('/{user}', 'show');
        Route::post('/', 'store');
        Route::put('/{user}', 'update');
        Route::delete('/{user}', 'destroy');
    });

    Route::group(['prefix' => 'products', 'controller' => ProductController::class], function () {

        Route::get('/', 'index');
        Route::get('/{product}', 'show');
        Route::post('/', 'store');
        Route::put('/{product}', 'update');
        Route::delete('/{product}', 'destroy');
    });

    Route::group(['prefix' => 'categories', 'controller' => CategoryController::class], function () {

        Route::get('/', 'index');
        Route::get('/{category}', 'show');
        Route::post('/', 'store');
        Route::put('/{category}', 'update');
        Route::delete('/{category}', 'destroy');
    });

    Route::group(['prefix' => 'publications', 'controller' => PublicationController::class], function () {

        Route::get('/', 'index');
        // Route::get('/{publication}', 'show');
        Route::post('/', 'store');
        // Route::put('/{publication}', 'update');
        Route::delete('/{publication}', 'destroy');
    });
    Route::group(['prefix' => 'coordinates', 'controller' => CoordinateController::class], function () {

        Route::get('/{publication}', 'index');
        // Route::get('/{publication}', 'show');
        Route::post('/', 'store');
        // Route::put('/{publication}', 'update');
        Route::delete('/{coordinate}', 'destroy');
    });
});
