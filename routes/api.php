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

Route::middleware(['api','cors','json_response'])->group(function () {
    Route::prefix("auth")->group(function (){
        Route::post('login', [\App\Http\Controllers\API\AuthController::class,"login"]);
        Route::post('logout', [\App\Http\Controllers\API\AuthController::class,"logout"]);
        Route::post('refresh', [\App\Http\Controllers\API\AuthController::class,"refresh"]);
        Route::post('register', [\App\Http\Controllers\API\AuthController::class,"register"]);
    });

    Route::middleware("auth")->group(function (){
        Route::prefix("pack")->group(function (){
            Route::get("/",[\App\Http\Controllers\API\PackController::class,"index"]);
            Route::get("/{id}",[\App\Http\Controllers\API\PackController::class,"show"]);
        });
        Route::prefix("subscription")->group(function (){
            Route::get("/",[\App\Http\Controllers\API\SubscriptionController::class,"index"]);
            Route::get("/{id}",[\App\Http\Controllers\API\SubscriptionController::class,"show"]);
            Route::post("/",[\App\Http\Controllers\API\SubscriptionController::class,"create"]);
            Route::put("/",[\App\Http\Controllers\API\SubscriptionController::class,"use_"]);
        });
    });

});
