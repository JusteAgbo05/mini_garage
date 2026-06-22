<?php

use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\TechnicienController;
use Illuminate\Support\Facades\Route;

// API vehicules
Route::get('/vehicules',         [VehiculeController::class, 'apiIndex']);
Route::get('/vehicules/{id}',    [VehiculeController::class, 'apiShow']);
Route::post('/vehicules',        [VehiculeController::class, 'apiStore']);
Route::put('/vehicules/{id}',    [VehiculeController::class, 'apiUpdate']);
Route::delete('/vehicules/{id}', [VehiculeController::class, 'apiDestroy']);

// API reparations
Route::get('/reparations',         [ReparationController::class, 'apiIndex']);
Route::get('/reparations/{id}',    [ReparationController::class, 'apiShow']);
Route::post('/reparations',        [ReparationController::class, 'apiStore']);
Route::put('/reparations/{id}',    [ReparationController::class, 'apiUpdate']);
Route::delete('/reparations/{id}', [ReparationController::class, 'apiDestroy']);

// API techniciens
Route::get('/techniciens',         [TechnicienController::class, 'apiIndex']);
Route::get('/techniciens/{id}',    [TechnicienController::class, 'apiShow']);
Route::post('/techniciens',        [TechnicienController::class, 'apiStore']);
Route::put('/techniciens/{id}',    [TechnicienController::class, 'apiUpdate']);
Route::delete('/techniciens/{id}', [TechnicienController::class, 'apiDestroy']);
