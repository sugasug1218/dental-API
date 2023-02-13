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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', App\Http\Controllers\Api\Auth\LoginController::class);
Route::post('see', App\Http\Controllers\Api\Auth\SeeAuthenticatingUserController::class);
// Route::post('logout', App\Http\Controllers\Api\Auth\LogoutController::class);
// Route::post('refresh', App\Http\Controllers\Api\Auth\TokenRefreshController::class);
