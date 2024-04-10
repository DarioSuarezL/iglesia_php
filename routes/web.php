<?php

    use Lib\Route;
    use App\Controllers\HomeController;
    use App\Controllers\MemberController;

    Route::get('/', [HomeController::class, 'index']);

    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/members/create', [MemberController::class, 'create']);
    Route::post('/members', [MemberController::class, 'store']);
    Route::get('/members/:id/edit', [MemberController::class, 'edit']);
    Route::get('/members/:id', [MemberController::class, 'show']); // Tiene que estar al final para no sobreescribir las demás rutas
    Route::post('/members/:id', [MemberController::class, 'update']);
    Route::post('/members/:id/delete', [MemberController::class, 'destroy']);

    Route::dispatch();