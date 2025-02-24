<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

// Define your API routes here
Route::post('/encode', [UrlController::class, 'encode'])->name('url.encode');

// Define your API routes here
Route::post('/decode', [UrlController::class, 'decode'])->name('url.decode');