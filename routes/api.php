<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::namespace("App\Http\Controllers\API")->group(function () {
    Route::prefix('v1')->group(function () {
        Route::resource('/categories', 'CategoryController')->except(['create', 'edit']);
    });
});

