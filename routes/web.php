<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

// La ruta principal ahora muestra la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Ruta para la página principal de padres
Route::get('/home', function() {
    return 'Bienvenido, esta es la página principal para padres.';
})->name('home');