<?php

use App\Http\Controllers\WarbleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WarbleController::class, 'index']);
Route::post('/warbles', [WarbleController::class, 'store']);
Route::get('/warbles/{warble}/edit', [WarbleController::class, 'edit']);
Route::put('/warbles/{warble}', [WarbleController::class, 'update']);
Route::delete('/warbles/{warble}', [WarbleController::class, 'destroy']);
