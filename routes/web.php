<?php


use Lib\Route;
use App\Controllers\HomeController;
use App\Controllers\MiembroController;
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


    Route::dispatch();