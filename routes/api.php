<?php
use Lomkit\Rest\Facades\Rest;
use Illuminate\Support\Facades\Route;
use App\Rest\Controllers\AuthUserController;
use App\Rest\Controllers\RecipeController;
use App\Rest\Controllers\FavoriteController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Rest::resource('recipes', RecipeController::class);
    Rest::resource('users', AuthUserController::class);
    Rest::resource('favorites', FavoriteController::class);
});
