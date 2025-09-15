<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::redirect('/', '/dashboard/login');

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Ruta para la página principal de padres
Route::get('/home', function() {
    return 'Bienvenido, esta es la página principal para padres.';
})->name('home');