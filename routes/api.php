<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

// Define your API routes here
Route::middleware('throttle:60,1')->group(function () {
    Route::post('/encode', [UrlController::class, 'encode'])->name('url.encode');
    Route::post('/decode', [UrlController::class, 'decode'])->name('url.decode');
});