<?php

    use Lib\Route;
    use App\Controllers\HomeController;
    
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/login', function(){
        return 'Login';
    });

    Route::get('/register', function(){
        return 'Register';
    });

    Route::get('/home', function(){
        return 'Home';
    });

    Route::get('/members', function(){
        return 'Miembros';
    });

    Route::get('/members/:id', function($id){
        return 'Miembro '.$id;
    });

    Route::dispatch();