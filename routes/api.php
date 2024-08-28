<?php

use App\Http\Controllers\UsuarioController;
use App\Service\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post ('/usuario', [UsuarioController::class, 'store']);

Route::get('/usuario/{id}/find',
[UsuarioController::class,'findById']);

Route::get('/usuario', [UsuarioController::class, 'index']);

Route::get('/usuario/search',
[UsuarioController::class, 'searchByName']);

Route::get('/usuarios/search/email',
[UsuarioController::class,'searchByemail']);

Route::delete('/usuario/{id}/delete',
[UsuarioController::class, 'delete']);

Route::put('/usuario', 
[UsuarioController::class, 'update']);