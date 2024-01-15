<?php

use App\Http\Controllers\CreditsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RequestCreditsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Users
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'getById']);
Route::get('/users', [UserController::class, 'show']);
Route::delete('/user/{id}', [UserController::class, 'deleteById']);
Route::put('/user/{id}', [UserController::class, 'updateById']);
Route::get('/users/all', [UserController::class, 'show']);

//RequestCredits
Route::get('/request_credits/all', [RequestCreditsController::class, 'show']);
Route::get('/request_credit/{id}', [RequestCreditsController::class, 'getById']);
Route::post('/request_credit', [RequestCreditsController::class, 'store']);
Route::delete('/request_credit/{id}', [RequestCreditsController::class, 'delete']);
Route::put('/request_credit/{id}', [RequestCreditsController::class, 'updateById']);

//Credits
Route::post('/credit', [CreditsController::class, 'store']);
Route::get('/credit/{id}', [CreditsController::class, 'getByUserId']);

//Login
Route::post('/login', [LoginController::class, 'authenticate']);
