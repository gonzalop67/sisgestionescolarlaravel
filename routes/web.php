<?php

use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MatriculacionController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ParaleloController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PpffController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TurnoController;
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

// rutas para las gestiones del sistema
Route::get('/admin/gestiones', [GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('auth');
Route::get('/admin/gestiones/create', [GestionController::class, 'create'])->name('admin.gestiones.create')->middleware('auth');
Route::post('/admin/gestiones/create', [GestionController::class, 'store'])->name('admin.gestiones.store')->middleware('auth');
Route::get('/admin/gestiones/{id}/edit', [GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('auth');
Route::put('/admin/gestiones/{id}', [GestionController::class, 'update'])->name('admin.gestiones.update')->middleware('auth');
Route::delete('/admin/gestiones/{id}', [GestionController::class, 'destroy'])->name('admin.gestiones.destroy')->middleware('auth');

// rutas para los periodos del sistema
Route::get('/admin/periodos', [PeriodoController::class, 'index'])->name('admin.periodos.index')->middleware('auth');
Route::post('/admin/periodos/create', [PeriodoController::class, 'store'])->name('admin.periodos.store')->middleware('auth');
Route::put('/admin/periodos/{id}', [PeriodoController::class, 'update'])->name('admin.periodos.update')->middleware('auth');
Route::delete('/admin/periodos/{id}', [PeriodoController::class, 'destroy'])->name('admin.periodos.destroy')->middleware('auth');

// rutas para los niveles del sistema
Route::get('/admin/niveles', [NivelController::class, 'index'])->name('admin.niveles.index')->middleware('auth');
Route::post('/admin/niveles/create', [NivelController::class, 'store'])->name('admin.niveles.store')->middleware('auth');
Route::put('/admin/niveles/{id}', [NivelController::class, 'update'])->name('admin.niveles.update')->middleware('auth');
Route::delete('/admin/niveles/{id}', [NivelController::class, 'destroy'])->name('admin.niveles.destroy')->middleware('auth');

// rutas para los grados del sistema
Route::get('/admin/grados', [GradoController::class, 'index'])->name('admin.grados.index')->middleware('auth');
Route::post('/admin/grados/create', [GradoController::class, 'store'])->name('admin.grados.store')->middleware('auth');
Route::put('/admin/grados/{id}', [GradoController::class, 'update'])->name('admin.grados.update')->middleware('auth');
Route::delete('/admin/grados/{id}', [GradoController::class, 'destroy'])->name('admin.grados.destroy')->middleware('auth');

// rutas para los paralelos del sistema
Route::get('/admin/paralelos', [ParaleloController::class, 'index'])->name('admin.paralelos.index')->middleware('auth');
Route::post('/admin/paralelos/create', [ParaleloController::class, 'store'])->name('admin.paralelos.store')->middleware('auth');
Route::put('/admin/paralelos/{id}', [ParaleloController::class, 'update'])->name('admin.paralelos.update')->middleware('auth');
Route::delete('/admin/paralelos/{id}', [ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy')->middleware('auth');

// rutas para los turnos del sistema
Route::get('/admin/turnos', [TurnoController::class, 'index'])->name('admin.turnos.index')->middleware('auth');
Route::get('/admin/turnos/create', [TurnoController::class, 'create'])->name('admin.turnos.create')->middleware('auth');
Route::post('/admin/turnos/create', [TurnoController::class, 'store'])->name('admin.turnos.store')->middleware('auth');
Route::get('/admin/turnos/{id}/edit', [TurnoController::class, 'edit'])->name('admin.turnos.edit')->middleware('auth');
Route::put('/admin/turnos/{id}', [TurnoController::class, 'update'])->name('admin.turnos.update')->middleware('auth');
Route::delete('/admin/turnos/{id}', [TurnoController::class, 'destroy'])->name('admin.turnos.destroy')->middleware('auth');

// rutas para las materias del sistema
Route::get('/admin/materias', [MateriaController::class, 'index'])->name('admin.materias.index')->middleware('auth');
Route::post('/admin/materias/create', [MateriaController::class, 'store'])->name('admin.materias.store')->middleware('auth');
Route::put('/admin/materias/{id}', [MateriaController::class, 'update'])->name('admin.materias.update')->middleware('auth');
Route::delete('/admin/materias/{id}', [MateriaController::class, 'destroy'])->name('admin.materias.destroy')->middleware('auth');

// rutas para los roles del sistema
Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::get('/admin/roles/permisos/{id}', [RoleController::class, 'permisos'])->name('admin.roles.permisos')->middleware('auth');
Route::put('/admin/roles/{id}', [RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');

// rutas para el personal del sistema
Route::get('/admin/personal/{tipo}', [PersonalController::class, 'index'])->name('admin.personal.index')->middleware('auth');
Route::get('/admin/personal/create/{tipo}', [PersonalController::class, 'create'])->name('admin.personal.create')->middleware('auth');
Route::post('/admin/personal/create', [PersonalController::class, 'store'])->name('admin.personal.store')->middleware('auth');
Route::get('/admin/personal/show/{id}', [PersonalController::class, 'show'])->name('admin.personal.show')->middleware('auth');
Route::get('/admin/personal/{id}/edit', [PersonalController::class, 'edit'])->name('admin.personal.edit')->middleware('auth');
Route::put('/admin/personal/{id}', [PersonalController::class, 'update'])->name('admin.personal.update')->middleware('auth');
Route::delete('/admin/personal/{id}', [PersonalController::class, 'destroy'])->name('admin.personal.destroy')->middleware('auth');

// rutas para la formación del personal
Route::get('/admin/personal/{id}/formaciones', [FormacionController::class, 'index'])->name('admin.formaciones.index')->middleware('auth');
Route::get('/admin/personal/{id}/formaciones/create', [FormacionController::class, 'create'])->name('admin.formaciones.create')->middleware('auth');
Route::post('/admin/personal/{id}/formaciones/create', [FormacionController::class, 'store'])->name('admin.formaciones.store')->middleware('auth');
Route::get('/admin/personal/formaciones/{id}', [FormacionController::class, 'edit'])->name('admin.formaciones.edit')->middleware('auth');
Route::put('/admin/personal/formaciones/{id}', [FormacionController::class, 'update'])->name('admin.formaciones.update')->middleware('auth');
Route::delete('/admin/personal/formaciones/{id}', [FormacionController::class, 'destroy'])->name('admin.formaciones.destroy')->middleware('auth');

// rutas para los estudiantes del sistema
Route::get('/admin/estudiantes', [EstudianteController::class, 'index'])->name('admin.estudiantes.index')->middleware('auth');
Route::get('/admin/estudiantes/create', [EstudianteController::class, 'create'])->name('admin.estudiantes.create')->middleware('auth');
Route::post('/admin/estudiantes/create', [EstudianteController::class, 'store'])->name('admin.estudiantes.store')->middleware('auth');
Route::get('/admin/estudiantes/{id}', [EstudianteController::class, 'show'])->name('admin.estudiantes.show')->middleware('auth');
Route::get('/admin/estudiantes/{id}/edit', [EstudianteController::class, 'edit'])->name('admin.estudiantes.edit')->middleware('auth');
Route::put('/admin/estudiantes/{id}', [EstudianteController::class, 'update'])->name('admin.estudiantes.update')->middleware('auth');
Route::delete('/admin/estudiantes/{id}', [EstudianteController::class, 'destroy'])->name('admin.estudiantes.destroy')->middleware('auth');

// ruta para obtener al padre de familia del estudiante
Route::post('/admin/estudiantes/obtenerPPFF', [EstudianteController::class, 'get_ppff'])->name('admin.estudiantes.obtenerPPFF')->middleware('auth');

// ruta para padres de familia del estudiante
Route::get('/admin/ppffs', [PpffController::class, 'index'])->name('admin.ppffs.index')->middleware('auth');
Route::post('/admin/estudiantes/ppff/create', [PpffController::class, 'store'])->name('admin.estudiantes.ppffs.store')->middleware('auth');
Route::get('/admin/ppffs/create', [PpffController::class, 'create'])->name('admin.ppffs.create')->middleware('auth');
Route::post('/admin/ppffs/create', [PpffController::class, 'store'])->name('admin.ppffs.store')->middleware('auth');
Route::get('/admin/ppffs/{id}', [PpffController::class, 'show'])->name('admin.ppffs.show')->middleware('auth');

// rutas para las matriculaciones del sistema
Route::get('/admin/matriculaciones', [MatriculacionController::class, 'index'])->name('admin.matriculaciones.index')->middleware('auth');
Route::get('/admin/matriculaciones/create', [MatriculacionController::class, 'create'])->name('admin.matriculaciones.create')->middleware('auth');
Route::post('/admin/matriculaciones/create', [MatriculacionController::class, 'store'])->name('admin.matriculaciones.store')->middleware('auth');
Route::get('/admin/matriculaciones/{id}', [MatriculacionController::class, 'show'])->name('admin.matriculaciones.show')->middleware('auth');
Route::get('/admin/matriculaciones/{id}/edit', [MatriculacionController::class, 'edit'])->name('admin.matriculaciones.edit')->middleware('auth');
Route::put('/admin/matriculaciones/{id}', [MatriculacionController::class, 'update'])->name('admin.matriculaciones.update')->middleware('auth');
Route::delete('/admin/matriculaciones/{id}', [MatriculacionController::class, 'destroy'])->name('admin.matriculaciones.destroy')->middleware('auth');
Route::get('/admin/matriculaciones/buscar_estudiante/{id}', [MatriculacionController::class, 'buscar_estudiante'])->name('admin.matriculaciones.buscar_estudiante')->middleware('auth');