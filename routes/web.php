<?php

use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\TechnicienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('vehicules.index');
});

// Routes web vehicules
Route::get('/vehicules',                [VehiculeController::class, 'index'])->name('vehicules.index');
Route::get('/vehicules/create',         [VehiculeController::class, 'create'])->name('vehicules.create');
Route::post('/vehicules',               [VehiculeController::class, 'store'])->name('vehicules.store');
Route::get('/vehicules/{vehicule}',     [VehiculeController::class, 'show'])->name('vehicules.show');
Route::get('/vehicules/{vehicule}/edit',[VehiculeController::class, 'edit'])->name('vehicules.edit');
Route::put('/vehicules/{vehicule}',     [VehiculeController::class, 'update'])->name('vehicules.update');
Route::delete('/vehicules/{vehicule}',  [VehiculeController::class, 'destroy'])->name('vehicules.destroy');

// Routes web reparations
Route::get('/reparations',                 [ReparationController::class, 'index'])->name('reparations.index');
Route::get('/reparations/create',          [ReparationController::class, 'create'])->name('reparations.create');
Route::post('/reparations',                [ReparationController::class, 'store'])->name('reparations.store');
Route::get('/reparations/{reparation}',    [ReparationController::class, 'show'])->name('reparations.show');
Route::get('/reparations/{reparation}/edit',[ReparationController::class, 'edit'])->name('reparations.edit');
Route::put('/reparations/{reparation}',    [ReparationController::class, 'update'])->name('reparations.update');
Route::delete('/reparations/{reparation}', [ReparationController::class, 'destroy'])->name('reparations.destroy');

// Routes web techniciens
Route::get('/techniciens',                 [TechnicienController::class, 'index'])->name('techniciens.index');
Route::get('/techniciens/create',          [TechnicienController::class, 'create'])->name('techniciens.create');
Route::post('/techniciens',                [TechnicienController::class, 'store'])->name('techniciens.store');
Route::get('/techniciens/{technicien}',    [TechnicienController::class, 'show'])->name('techniciens.show');
Route::get('/techniciens/{technicien}/edit',[TechnicienController::class, 'edit'])->name('techniciens.edit');
Route::put('/techniciens/{technicien}',    [TechnicienController::class, 'update'])->name('techniciens.update');
Route::delete('/techniciens/{technicien}', [TechnicienController::class, 'destroy'])->name('techniciens.destroy');
