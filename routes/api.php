<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\Auth\TokenExchangeController;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/me', [UserController::class,'index'])->name('me');
Route::middleware('auth:sanctum')->post('/logout', [LogoutController::class,'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class,'index'])->name('register');
Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])
    ->middleware(['auth:sanctum', 'throttle:6,1'])
    ->name('verification.send');
Route::middleware('auth:sanctum')->get('/organizations', [OrganizationController::class, 'index'])->name('organizations.index');
Route::middleware('auth:sanctum')->post('/token-exchange', TokenExchangeController::class);
