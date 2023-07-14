<?php

use App\Http\Controllers\ApplianceController;
use Illuminate\Support\Facades\Route;

Route::post('/appliance', [ApplianceController::class, 'create']);
Route::get('/appliance', [ApplianceController::class, 'getAll']);
Route::get('/appliance/{id}', [ApplianceController::class, 'getOneById']);
Route::delete('/appliance/{id}', [ApplianceController::class, 'delete']);
Route::patch('/appliance/{id}', [ApplianceController::class, 'update']);