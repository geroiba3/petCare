<?php
use app\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/usuarios', UsuarioController::class);