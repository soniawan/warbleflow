<?php

use App\Http\Controllers\WarbleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WarbleController::class, 'index']);
