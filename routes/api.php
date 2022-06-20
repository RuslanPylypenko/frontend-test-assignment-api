<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PositionsController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('token', [AuthController::class, 'token']);

Route::get('positions', [PositionsController::class, 'index'])->name('positions.index');
Route::get('users', [UsersController::class, 'index'])->name('users.index');
Route::post('users', [UsersController::class, 'store'])
    ->middleware('token')
    ->name('users.store');

Route::get('users/{id}', [UsersController::class, 'show'])
    ->name('users.show');
