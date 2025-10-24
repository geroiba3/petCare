<?php

use App\Http\Controllers\Admin\MascotaController;
use App\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/usuarios', UsuarioController::class);
Route::resource('/mascota', MascotaController::class);


