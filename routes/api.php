<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test-log', function () {
    Log::debug('This is a debug log message.');
    Log::info('This is an info log message.');
    Log::warning('This is a warning log message.');
    Log::error('This is an error log message.');
    return 'Logs have been recorded.';
});

Route::get('/fetch-business/{taxCode}', [BusinessController::class, 'fetchBusiness']);

Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/me', [AuthController::class, 'me'])->name('me');
});
