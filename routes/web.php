<?php

    use Lib\Route;
    use App\Controllers\HomeController;
    use App\Controllers\MiembroController;

    Route::get('/', [HomeController::class, 'index']);

    Route::get('/miembros', [MiembroController::class, 'index']);
    Route::get('/miembros/create', [MiembroController::class, 'create']);
    Route::post('/miembros', [MiembroController::class, 'store']);
    Route::get('/miembros/:id/edit', [MiembroController::class, 'edit']);
    Route::get('/miembros/:id', [MiembroController::class, 'show']); // Tiene que estar al final para no sobreescribir las demás rutas
    Route::post('/miembros/:id', [MiembroController::class, 'update']);
    Route::post('/miembros/:id/delete', [MiembroController::class, 'destroy']);

    Route::dispatch();