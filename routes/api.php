<?php

use App\Http\Controllers\CarParkController;
use App\Http\Controllers\CarParkSpacesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SpaceReservationController;
use App\Http\Controllers\UserReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', LoginController::class);

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/car-parks', CarParkController::class);
    Route::get('/car-parks/{car_park}/spaces', CarParkSpacesController::class);

    Route::post('/spaces/{space}/reservations', SpaceReservationController::class);
    
    Route::apiResource('reservations', ReservationController::class)->only(['destroy']);

    Route::get('/users/{user}/reservations', UserReservationController::class);
});
