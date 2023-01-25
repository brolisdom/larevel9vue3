<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('getUsers', [UserController::class, 'getUsers']);
// Route::post('getUser', [UserController::class, 'getUser']);
Route::post('createUser', [UserController::class, 'createUser']);
Route::post('updateUser', [UserController::class, 'updateUser']);
Route::post('deleteUser', [UserController::class, 'deleteUser']);
