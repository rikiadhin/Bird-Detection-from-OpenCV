<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\MonitorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// API
Route::get('/send-data-temp/{temp}', [ApiController::class, 'sendDataTemp']);
Route::get('/send-data-bird/{sensor}', [ApiController::class, 'sendDataBird']);
Route::get('/get-data', [ApiController::class, 'getData']);
Route::get('/get-data-camera', [ApiController::class, 'getDataCamera']);

// GUI
Route::get('/', [MonitorController::class, 'index']);
