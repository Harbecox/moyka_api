<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix("admin")->middleware(["guard.web","auth"])->as("admin.")->group(function (){
    Route::get("/",[\App\Http\Controllers\Admin\DashboardController::class,"index"])->name("dashboard");
    Route::resource("company",\App\Http\Controllers\Admin\CompanyController::class);
    Route::resource("pack",\App\Http\Controllers\Admin\PackController::class);
    Route::resource("user",\App\Http\Controllers\Admin\UserController::class);
});
