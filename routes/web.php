<?php


use Lib\Route;
use App\Controllers\HomeController;
use App\Controllers\CargoController;
use App\Controllers\MiembroController;
use App\Controllers\BautismoController;
use App\Controllers\MinisterioController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/miembros', [MiembroController::class, 'index']);
Route::get('/miembros/create', [MiembroController::class, 'create']);
Route::post('/miembros', [MiembroController::class, 'store']);
Route::get('/miembros/:id/edit', [MiembroController::class, 'edit']);
Route::get('/miembros/:id', [MiembroController::class, 'show']); // Tiene que estar al final para no sobreescribir las demás rutas
Route::post('/miembros/:id', [MiembroController::class, 'update']);
Route::post('/miembros/:id/delete', [MiembroController::class, 'destroy']);

Route::get('/ministerios', [MinisterioController::class, 'index']);
Route::get('/ministerios/create', [MinisterioController::class, 'create']);
Route::post('/ministerios', [MinisterioController::class, 'store']);
Route::get('/ministerios/:id/edit', [MinisterioController::class, 'edit']);
Route::get('/ministerios/:id', [MinisterioController::class, 'show']); // Tiene que estar al final para no sobreescribir las demás rutas
Route::post('/ministerios/:id', [MinisterioController::class, 'update']);
Route::post('/ministerios/:id/delete', [MinisterioController::class, 'destroy']);

// Route::get('/miembros/:id/ministerios', [MiembroController::class, 'ministerios']);

Route::get('/cargos', [CargoController::class, 'index']);
Route::get('/cargos/create', [CargoController::class, 'create']);
Route::post('/cargos', [CargoController::class, 'store']);
Route::get('/cargos/:id/edit', [CargoController::class, 'edit']);
Route::get('/cargos/:id', [CargoController::class, 'show']); // Tiene que estar al final para no sobreescribir las demás rutas
Route::post('/cargos/:id', [CargoController::class, 'update']);
Route::post('/cargos/:id/delete', [CargoController::class, 'destroy']);


Route::get('/bautismos', [BautismoController::class, 'index']);
Route::get('/bautismos/create', [BautismoController::class, 'create']);
Route::post('/bautismos', [BautismoController::class, 'store']);
Route::get('/bautismos/:id/edit', [BautismoController::class, 'edit']);
Route::get('/bautismos/:id', [BautismoController::class, 'show']); // Tiene que estar al final para no sobreescribir las demás rutas
Route::post('/bautismos/:id', [BautismoController::class, 'update']);
Route::post('/bautismos/:id/delete', [BautismoController::class, 'destroy']);


Route::dispatch();
