<?php

use App\Http\Controllers\ConfiguracionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para la configuración del sistema
Route::get('/admin/configuracion', [ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth');
Route::post('/admin/configuracion/create', [ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth');