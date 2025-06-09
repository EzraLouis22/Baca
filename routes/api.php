<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RenunganController;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('is-email-exist', [UserController::class, 'isEmailExist']);

Route::group(['middleware' => 'jwt.verify'], function ($router){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('users', [UserController::class, 'show']);
    Route::put('users', [UserController::class, 'update']);
    Route::get('/renungans', [RenunganController::class, 'index']);
    Route::get('/renungans/{renungan}', [RenunganController::class, 'show']);
});


