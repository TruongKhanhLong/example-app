<?php
use App\Http\Controllers\BusinessController;

Route::get('/fetch-business/{taxCode}', [BusinessController::class, 'fetchAndSaveBusiness']);
