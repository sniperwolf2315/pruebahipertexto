<?php

use App\Http\Controllers\RandomUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/random-users', [RandomUserController::class, 'getUsers']);
