<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Fetch
Route::prefix('fetch')->group(function () {
    Route::get('/tickets', [\App\Http\Controllers\TicketController::class, 'fetch']);
    Route::get('/task', [\App\Http\Controllers\TodoController::class, 'fetch']);
});

// Create
Route::prefix('create')->group(function () {
    Route::post('/ticket', [\App\Http\Controllers\TicketController::class, 'create']);
    Route::post('/task', [\App\Http\Controllers\TodoController::class, 'create']);
});

// Update
Route::prefix('update')->group(function () {
    Route::post('/task', [\App\Http\Controllers\TodoController::class, 'markCompleted']);
});
