<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\WarbleController;
use Illuminate\Support\Facades\Route;

// Registration routes
Route::view('/register', 'auth.register')
  ->middleware('guest')
  ->name('register');
Route::post('/register', Register::class)
  ->middleware('guest');

Route::get('/', [WarbleController::class, 'index']);

// Login routes
Route::view('/login', 'auth.login')
  ->middleware('guest')
  ->name('login');

Route::post('/login', Login::class)
  ->middleware('guest');

// Logout routes
Route::post('/logout', Logout::class)
  ->middleware('auth')
  ->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
  Route::post('/warbles', [WarbleController::class, 'store']);
  Route::get('/warbles/{warble}/edit', [WarbleController::class, 'edit']);
  Route::put('/warbles/{warble}', [WarbleController::class, 'update']);
  Route::delete('/warbles/{warble}', [WarbleController::class, 'destroy']);
});
